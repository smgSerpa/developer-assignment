<?php

namespace App\Http\Controllers;

use App\Console\Commands\UpdateNordPoolPrices;
use App\Models\Price;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function dashboard(): View
    {
        $prices = Price::query()->orderBy('id')->get();

        return view('dashboard', [
            'prices' => $prices,
        ]);
    }

    public function updatePrices()
    {
        Artisan::call(UpdateNordPoolPrices::class);

        return redirect()->route('dashboard');
    }
}
