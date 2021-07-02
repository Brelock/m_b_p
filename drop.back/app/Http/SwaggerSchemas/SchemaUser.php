<?php


namespace App\Http\SwaggerSchemas;

/**
 * Class SchemaUser
 * @package App\Models\SwaggerSchema
 *
 * @OA\Schema(
 *   required={"first_name", "last_name", "email"},
 *   @OA\Xml(name="SchemaUser"),
 *   @OA\Property(
 *      property="id",
 *      description="Primary key.",
 *      type="integer",
 *      example="1 or 2"
 *   ),
 *   @OA\Property(
 *      property="first_name",
 *      description="First name for the user.",
 *      type="string"
 *   ),
 *   @OA\Property(
 *      property="last_name",
 *      description="Last name for the user.",
 *      type="string"
 *   ),
 *   @OA\Property(
 *      property="email",
 *      description="E-mail for the user.",
 *      type="string",
 *      example="admin@gmail.com"
 *   )
 * )
 */
class SchemaUser {

}
