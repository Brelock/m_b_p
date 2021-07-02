<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

class AuthDto implements Arrayable {
  /**
   * @var string
   */
  protected $email;

  /**
   * @var string
   */
  protected $password;

  /**
   * AuthDto constructor.
   *
   * @param string $email
   * @param string $password
   */
  public function __construct(string $email, string $password) {
    $this->email = $email;
    $this->password = $password;
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
  public function getPassword(): string {
    return $this->password;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      'email' => $this->email,
      'password' => $this->password,
    ];
  }

  /**
   * @param array $attributes
   * @return AuthDto
   */
  public static function createFromArray(array $attributes) : self {
    return new self(
      (string)Arr::get($attributes, 'email', ''),
      (string)Arr::get($attributes, 'password', '')
    );
  }
}