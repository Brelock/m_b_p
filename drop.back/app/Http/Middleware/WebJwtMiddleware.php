<?php

namespace App\Http\Middleware;

use App\Helpers\Auth\JWTAuthHelper;
use App\Services\Auth\Exceptions\RetrieveTokenNotFound;
use App\Services\Auth\WebAuthService;
use Closure;

class WebJwtMiddleware {
  /**
   * @var WebAuthService
   */
  protected $authService;

  /**
   * WebJwtMiddleware constructor.
   *
   * @param WebAuthService $authService
   */
  public function __construct(WebAuthService $authService) {
    $this->authService = $authService;
  }

  /**
   * Handle an incoming request.
   *
   * @param $request
   * @param Closure $next
   *
   * @return mixed
   */
  public function handle($request, Closure $next) {
    try {
      $this->authService->attemptByToken($this->authService->getStoreToken()->retrieveToken());
    } catch(RetrieveTokenNotFound $exception) {
      try {
        $this->authService->attemptByToken(JWTAuthHelper::parseToken()->getToken());
      } catch (\Exception $exception) {
        // ...
      }
    } catch(\Exception $exception) {

    }

    return $next($request);
  }
}
