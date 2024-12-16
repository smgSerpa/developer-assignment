<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Exception;

class NordPoolService
{
    protected PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::timeout(10)
            ->baseUrl(config('nordpool.url'))
            ->withQueryParameters([
                'deliveryArea' => config('nordpool.delivery_area'),
                'currency' => config('nordpool.currency'),
            ])
            ->acceptJson();
    }

    /**
     * Fetch electricity prices from the Nord Pool API.
     *
     * @param  string  $date
     * @return object|null
     */
    public function fetchPrices(string $date): ?object
    {
        try {
            return $this->client
                ->get('api/DayAheadPrices', [
                    'date' => $date,
                ])
                ->object();
        } catch (Exception) {
            return null;
        }
    }

}
