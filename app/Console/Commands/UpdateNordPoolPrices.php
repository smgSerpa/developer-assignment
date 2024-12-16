<?php

namespace App\Console\Commands;

use App\Enums\PriceProviders;
use App\Models\Price;
use App\Services\NordPoolService;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;

class UpdateNordPoolPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-nord-pool-prices {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching prices of the Nord Pool and saves them in DB';

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(NordPoolService $nordPoolService): int
    {
        $date = $this->option('date') ?? today()->format('Y-m-d');
        $area = config('nordpool.delivery_area');

        $pricesObject = $nordPoolService->fetchPrices($date);

        if (!$pricesObject) {
            throw new Exception('Could not fetch prices');
        }

        // ensure that deliveryArea is correct
        if (!in_array($area, $pricesObject->deliveryAreas)) {
            throw new Exception("Incorrect delivery area");
        }

        // ensure that currency is correct
        if ($pricesObject->currency !== config('nordpool.currency')) {
            throw new Exception("Incorrect currency");
        }

        $this->savePrices($pricesObject->multiAreaEntries, $area);

        return self::SUCCESS;
    }

    private function savePrices(array $prices, string $area): void
    {
        $preparedPrices = array_map(function (object $price) use ($area) {
            return [
                'provider' => PriceProviders::NORDPOOL,
                'delivery_start' => Carbon::parse($price->deliveryStart),
                'delivery_end' => Carbon::parse($price->deliveryEnd),
                'price' => $price->entryPerArea->$area,
            ];
        }, $prices);

        Price::query()
            ->upsert($preparedPrices, ['provider', 'delivery_start']);
    }
}
