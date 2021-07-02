<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @SWG\Swagger(
 *   schemes={"http"},
 *   @SWG\SecurityScheme(
 *      securityDefinition="Bearer",
 *      type="apiKey",
 *      name="Authorization",
 *      in="header"
 *   )
 *   @OA\Info(
 *      version="1.0.0",
 *      title="DROP Project",
 *      description="API Documentation for DROP",
 *      termsOfService=""
 *   )
 * )
 */
class Controller extends BaseController {
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
