<?php

namespace App\Services\Auth;

use App\DTO\AuthDto;
use App\Helpers\Auth\AuthenticatedUser;
use App\Helpers\Auth\JWTAuthHelper;
use App\Models\User;
use App\Services\Auth\Exceptions\AuthException;
use App\Services\Auth\Token\IStoreToken;
use App\Services\Auth\Token\NullObjectStoreToken;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtAuthService implements IAuthService {
  /**
   * @return IStoreToken
   */
  public function getStoreToken(): IStoreToken {
    return new NullObjectStoreToken();
  }

  /**
   * @param AuthDto $dto
   *
   * @return string
   *
   * @throws AuthException
   */
  public function attemptByCredentials(AuthDto $dto) : string {
    try {
      if (!$token = JWTAuthHelper::attempt($dto->toArray())) {
        throw new AuthException('Invalid credentials.', 422);
      }
    } catch (JWTException $e) {
      throw new AuthException('Could not create token.', 422);
    }

    if(!AuthenticatedUser::hasAccess())
      throw new AuthException('User does not have rights.', 401);

    return $token;
  }

  /**
   * @param User $user
   * @return string
   */
  public function attemptByUser(User $user) : string {
    return JWTAuthHelper::fromUser($user);
  }

  /**
   * @param string $token
   *
   * @return User
   *
   * @throws AuthException
   */
  public function attemptByToken(string $token) : User {
    try {
      /* @var User $user */
      if (!$user = JWTAuthHelper::setToken($token)->authenticate()) {
        throw new AuthException('User not found.', 404);
      }
    } catch (TokenExpiredException $e) {
      throw new AuthException('Token is expired.', $e->getCode());
    } catch (TokenInvalidException $e) {
      throw new AuthException('Token is invalid.', $e->getCode());
    } catch (JWTException $e) {
      throw new AuthException('Token is absent.', $e->getCode());
    }

    return $user;
  }

  /**
   * @return JwtAuthService
   */
  public function invalidate() : self {
    JWTAuthHelper::invalidate(true);
    return $this;
  }
}