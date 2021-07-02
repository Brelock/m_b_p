<?php

namespace App\Services\Actions;

use App\DTO\UserDto;
use App\Models\User;
use App\Services\UserService;

class UserServiceAction {
  /**
   * @param UserDto $dto
   * @return User
   */
  public function createUser(UserDto $dto) : User {
    return $this->saveUser(new User(), $dto);
  }

  /**
   * @param User $user
   * @param UserDto $dto
   *
   * @return User
   */
  public function updateUser(User $user, UserDto $dto) : User {
    return $this->saveUser($user, $dto);
  }

  /**
   * @param User $user
   * @param UserDto $dto
   *
   * @return User
   */
  protected function saveUser(User $user, UserDto $dto) : User {
    $service = new UserService($user);

    $service->changeAttributes($dto);

    if($dto->hasNewPassword())
      $service->setNewPassword($dto->getNewPassword());

    $service->commitChanges();

    return $service->getUser();
  }
}