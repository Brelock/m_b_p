<?php

namespace App\Http\Controllers\Api\Helpers;

use App\Http\Resources\UserResource;
use App\Models\User;

trait ResponderWithToken {
  /**
   * @param string $token
   * @param User|null $user
   * @param array $optionalData
   * @param array $messages
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function respondWithToken(string $token, User $user = null, array $optionalData = [], array $messages = []) {
    return jsonResponse($messages, 200, array_merge(
      [
        'access_token' => $token,
      ],

      ($user
        ? ['user' => new UserResource($user)]
        : []),

      $optionalData
    ))->header('Authorization', $token);
  }
}