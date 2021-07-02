<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

class UserDto implements Arrayable {
  /**
   * @var string
   */
  protected $firstName;

  /**
   * @var string
   */
  protected $lastName;

  /**
   * @var string
   */
  protected $email;

  /**
   * @var string
   */
  protected $newPassword;

  /**
   * UserDto constructor.
   *
   * @param string $firstName
   * @param string $lastName
   * @param string $email
   * @param string $newPassword
   */
  public function __construct(string $firstName,
                              string $lastName,
                              string $email,
                              string $newPassword = null) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->newPassword = $newPassword;
  }

  /**
   * @return string
   */
  public function getFirstName(): string {
    return $this->firstName;
  }

  /**
   * @return string
   */
  public function getLastName(): string {
    return $this->lastName;
  }

  /**
   * @return string
   */
  public function getEmail(): string {
    return $this->email;
  }

  /**
   * @return string
   */
  public function getNewPassword(): string {
    return $this->newPassword;
  }

  /**
   * @return bool
   */
  public function hasNewPassword() : bool {
    return !empty($this->newPassword);
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      'first_name' => $this->firstName,
      'last_name' => $this->lastName,
      'email' => $this->email,
    ];
  }

  /**
   * @param array $attributes
   * @return UserDto
   */
  public static function createFromArray(array $attributes) : self {
    return new self(
      (string)Arr::get($attributes, 'first_name'),
      (string)Arr::get($attributes, 'last_name'),
      (string)Arr::get($attributes, 'email'),
      ((string)Arr::get($attributes, 'password') ?: null)
    );
  }
}