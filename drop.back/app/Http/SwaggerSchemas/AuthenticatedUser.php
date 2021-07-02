<?php

namespace App\Http\SwaggerSchemas;

/**
 * Class AuthenticatedUser
 * @package App\Http\SwaggerSchemas
 *
 * @OA\Schema(
 *   required={"id", "name", "email"},
 *   @OA\Xml(name="AuthenticatedUser"),
 *   @OA\Property(
 *      property="id",
 *      description="Primary key.",
 *      type="integer"
 *   ),
 *   @OA\Property(
 *      property="name",
 *      description="Name of this user.",
 *      type="string"
 *   ),
 *   @OA\Property(
 *      property="email",
 *      description="E-mail of this user.",
 *      type="string"
 *   )
 * )
 */
class AuthenticatedUser {
}
