<?php

namespace App\Http\SwaggerSchemas;

/**
 * Class RequestBodyUserLogin
 * @package App\Http\SwaggerSchemas
 *
 * @OA\Schema(
 *   required={"email", "password"},
 *   @OA\Xml(name="RequestBodyUserLogin"),
 *   @OA\Property(
 *      property="email",
 *      description="E-mail for login.",
 *      type="string",
 *      example="admin@gmail.com"
 *   ),
 *   @OA\Property(
 *      property="password",
 *      description="Password for login.",
 *      type="string",
 *      example="123456789"
 *   )
 * )
 */
class RequestBodyUserLogin {
}
