<?php


namespace App\Http\SwaggerSchemas;

/**
 * Class SchemaUserResource
 * @package App\Models\SwaggerSchema
 *
 * @OA\Schema(
 *   required={"first_name", "last_name", "email"},
 *   @OA\Xml(name="SchemaUserResource"),
 *   @OA\Property(
 *      property="id",
 *      description="Primary key.",
 *      type="integer"
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
 *      property="full_name",
 *      description="Full name for the user.",
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
class SchemaUserResource {

}
