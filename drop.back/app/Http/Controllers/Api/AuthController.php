<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Auth\AuthenticatedUser;
use App\Helpers\Auth\JWTAuthHelper;
use App\Http\Controllers\Api\Helpers\ResponderWithToken;
use App\Http\Controllers\Controller;
use App\Http\Requests\JwtAuthRequest;
use App\Services\Auth\Exceptions\AuthException;
use App\Services\Auth\IAuthService;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\JwtAuthService;

class AuthController extends Controller {
  use ResponderWithToken;

  /**
   * @var IAuthService
   */
  protected $authService;

  /**
   * AuthController constructor.
   *
   * @param IAuthService $authService
   */
  public function __construct(IAuthService $authService) {
    $this->authService = $authService;
  }

  /**
   * @OA\Post(
   *   path="/auth/login",
   *   tags={"Authorization"},
   *   operationId="authenticate",
   *   summary="Login user and get bearer token",
   *   description="",
   *   @OA\RequestBody(
   *      required=true,
   *      @OA\JsonContent(ref="#/components/schemas/RequestBodyUserLogin")
   *   ),
   *   @OA\Response(
   *      response=200,
   *      description="successful operation",
   *      @OA\Header(header="Authorization", @OA\Schema(type="string"), description="Bearer token"),
   *      @OA\JsonContent(
   *        @OA\Property(
   *          property="access_token",
   *          description="Access token for authorize user.",
   *          type="string"
   *        ),
   *        @OA\Property(
   *          property="user",
   *          description="Authenticated user.",
   *          type="object",
   *          ref="#/components/schemas/SchemaUserResource"
   *        )
   *      )
   *   ),
   *   @OA\Response(
   *      response=400,
   *      description="could not create token"
   *   ),
   *   @OA\Response(
   *      response=422,
   *      description="invalid credentials"
   *   )
   * )
   *
   * @param JwtAuthRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function authenticate(JwtAuthRequest $request) {
    try {
      $token = $this->authService->attemptByCredentials($request->createDto());
    } catch (AuthException $exception) {
      return jsonResponse($exception->getMessage(), $exception->getCode());
    }

    return $this->respondWithToken($token, AuthenticatedUser::getUser());
  }

  /**
   * Returns user by bearer token.
   *
   * @OA\Get(
   *   path="/auth/user",
   *   tags={"Authorization"},
   *   summary="Returns user by bearer token.",
   *   description="Returns user by bearer token.",
   *   operationId="getUserByToken",
   *   @OA\Response(
   *      response=200,
   *      description="successful operation",
   *      @OA\Header(header="Authorization", @OA\Schema(type="string"), description="Bearer token"),
   *      @OA\JsonContent(
   *        @OA\Property(
   *          property="access_token",
   *          description="Access token for authorize user.",
   *          type="string"
   *        ),
   *        @OA\Property(
   *          property="user",
   *          description="Authenticated user.",
   *          type="object",
   *          ref="#/components/schemas/SchemaUserResource"
   *        )
   *      )
   *   ),
   *   @OA\Response(
   *      response="404",
   *      description="User not authenticated"
   *   ),
   *   security={{"Bearer":{}}}
   * )
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function getAuthenticatedUser() {
    try {
      $authenticatedUser = $this->authService->attemptByToken(JWTAuthHelper::getToken());
    } catch (AuthException $ex) {
      return jsonResponse($ex->getMessage(), $ex->getCode());
    }

    return $this->respondWithToken(JWTAuthHelper::getToken(), $authenticatedUser);
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout() {
    $this->authService->invalidate();

    return jsonResponse('logout', 200);
  }
}
