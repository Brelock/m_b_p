<?php

namespace App\Services\Auth;

use App\DTO\AuthDto;
use App\Models\User;
use App\Services\Auth\Exceptions\AuthException;
use App\Services\Auth\Token\IStoreToken;

interface IAuthService {
  /**
   * @return IStoreToken
   */
  public function getStoreToken() : IStoreToken;

  /**
   * @param AuthDto $dto
   *
   * @return string
   *
   * @throws AuthException
   */
  public function attemptByCredentials(AuthDto $dto) : string;

  /**
   * @param User $user
   * @return string
   */
  public function attemptByUser(User $user) : string;

  /**
   * @param string $token
   *
   * @return User
   *
   * @throws AuthException
   */
  public function attemptByToken(string $token) : User;

  /**
   * @return IAuthService
   */
  public function invalidate();
}