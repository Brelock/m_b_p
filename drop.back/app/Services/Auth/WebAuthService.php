<?php

namespace App\Services\Auth;

use App\DTO\AuthDto;
use App\Models\User;
use App\Services\Auth\Exceptions\AuthException;
use App\Services\Auth\Token\IStoreToken;
use App\Services\Auth\Token\SessionStoreToken;

class WebAuthService implements IAuthService {
  /**
   * @var SessionStoreToken
   */
  protected $storeToken;

  /**
   * @var JwtAuthService
   */
  protected $jwtAuthService;

  /**
   * WebAuthService constructor.
   *
   * @param JwtAuthService $jwtAuthService
   * @param SessionStoreToken $storeToken
   */
  public function __construct(JwtAuthService $jwtAuthService, SessionStoreToken $storeToken) {
    $this->storeToken = $storeToken;
    $this->jwtAuthService = $jwtAuthService;
  }

  /**
   * @return IStoreToken
   */
  public function getStoreToken(): IStoreToken {
    return $this->storeToken;
  }

  /**
   * @param AuthDto $dto
   *
   * @return string
   *
   * @throws AuthException
   */
  public function attemptByCredentials(AuthDto $dto): string {
    $token = $this->jwtAuthService->attemptByCredentials($dto);

    $this->storeToken->storeToken($token);

    return $token;
  }

  /**
   * @param User $user
   * @return string
   */
  public function attemptByUser(User $user): string {
    $token = $this->jwtAuthService->attemptByUser($user);

    $this->storeToken->storeToken($token);

    return $token;
  }

  /**
   * @param string $token
   *
   * @return User
   *
   * @throws AuthException
   */
  public function attemptByToken(string $token): User {
    $user = $this->jwtAuthService->attemptByToken($token);

    $this->storeToken->storeToken($token);

    return $user;
  }

  /**
   * @return IAuthService
   */
  public function invalidate(): IAuthService {
    $this->jwtAuthService->invalidate();

    $this->storeToken->clearToken();

    return $this;
  }
}