<?php


namespace App\Http\SwaggerSchemas;

/**
 * Class SchemaUserRequest.
 * @package App\Models\SwaggerSchemas
 *
 * @OA\Schema(
 *   required={"first_name", "last_name", "email"},
 *   @OA\Property(
 *      property="first_name",
 *      description="First name for the user",
 *      type="string"
 *   ),
 *   @OA\Property(
 *      property="last_name",
 *      description="Last name for the user",
 *      type="string"
 *   ),
 *   @OA\Property(
 *      property="email",
 *      description="Email for the user",
 *      type="string"
 *   ),
 *   @OA\Property(
 *      property="password",
 *      description="Password for the user",
 *      type="string"
 *   )
 * )
 */
class SchemaUserRequest {

}