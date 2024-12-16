<?php

return [
    'url' => env('NORDPOOL_URL'),
    'delivery_area' => env('NORDPOOL_DELIVERY_AREA', 'LV'),
    'currency' => env('NORDPOOL_CURRENCY', 'EUR'),
    'price_multiplier' => env('NORDPOOL_PRICE_MULTIPLIER', 1),
];
