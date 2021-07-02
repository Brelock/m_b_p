<?php

namespace App\Services;

use App\DTO\UserDto;
use App\Models\User;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Support\Facades\Hash;

class UserService {
  use PromiseActionsTrait;

  /**
   * @var User
   */
  private $user;

  /**
   * UserService constructor.
   *
   * @param User $user
   */
  public function __construct(User $user) {
    $this->user = $user;
  }

  /**
   * @return User
   */
  public function getUser(): User {
    return $this->user;
  }

  /**
   * @param UserDto $dto
   * @return UserService
   */
  public function changeAttributes(UserDto $dto) : self {
    $this->user->fill($dto->toArray());
    return $this;
  }

  /**
   * Make hash for password and set to the user.
   *
   * @param string $password
   * @return $this
   */
  public function setNewPassword(string $password) : self {
    if(!empty($password) || Hash::needsRehash($password)) {
      $this->user->password = Hash::make($password);
      return $this;
    }

    throw new \LogicException('Password must be required and not hashed.');
  }

  /**
   * @return UserService
   */
  public function commitChanges() : self {
    $this->user->save();

    $this->releasePromiseActions();

    return $this;
  }
}