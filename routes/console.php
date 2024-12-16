<?php

use App\Console\Commands\UpdateNordPoolPrices;
use Illuminate\Support\Facades\Schedule;

Schedule::command(UpdateNordPoolPrices::class)
    ->everyMinute(); // every minute for easier testing process
