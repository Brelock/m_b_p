<?php

namespace App\Http\Middleware;

use App\Helpers\Auth\JWTAuthHelper;
use Closure;
use Exception;

class JwtMiddleware {
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    try {
      $user = JWTAuthHelper::parseToken()->authenticate();
    } catch (Exception $e) {
      if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
        return jsonResponse('Token is Invalid.', 401);
      } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
        return jsonResponse('Token is Expired.', 401);
      } else {
        return jsonResponse('Authorization Token not found.', 401);
      }
    }

    if (!$user)
      return jsonResponse('User not found.', 404);

    return $next($request);
  }
}
