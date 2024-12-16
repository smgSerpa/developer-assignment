<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\JsonResponse;

class PricesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/prices/current-hour",
     *     @OA\Response(response="200", description="Get curent hour price"),
     *     @OA\Response(response="404", description="Price not found"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function currentHourPrice(): JsonResponse
    {
        $date = now();

        $getPrice = Price::query()
            ->whereRaw('HOUR(delivery_start) = ?', [
                $date->hour,
            ])
            // to ensure if there would be more than one record per same hour
            ->where('delivery_end', '>', $date)
            ->first();

        if (!$getPrice) {
            return response()->json([
                'message' => 'Price not found for this hour',
            ], 404);
        }

        return response()->json([
            'price' => $getPrice->price_multiplied,
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/prices/next-hour",
     *     @OA\Response(response="200", description="Get next hour price"),
     *     @OA\Response(response="404", description="Price not found"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function nextHourPrice(): JsonResponse
    {
        $date = now()->addHour();

        $getPrice = Price::query()
            ->whereRaw('HOUR(delivery_start) = ?', [
                $date->hour,
            ])
            // to ensure if there would be more than one record per same hour
            ->where('delivery_end', '>', $date)
            ->first();

        if (!$getPrice) {
            return response()->json([
                'message' => 'Price not found for next hour',
            ], 404);
        }

        return response()->json([
            'price' => $getPrice->price_multiplied,
        ]);
    }
}
