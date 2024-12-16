<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(title="Dashboard API", version="1.0")
 *
 * @OA\SecurityScheme(
 *  type="http",
 *  securityScheme="bearerAuth",
 *  scheme="bearer",
 *  bearerFormat="JWT"
 *  )
 */
abstract class Controller
{
    //
}
