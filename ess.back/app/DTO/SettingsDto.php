<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;

class SettingsDto implements Arrayable {
  /**
   * @var string
   */
  protected $email;

	/**
	 * SettingsDto constructor.
	 *
	 * @param string $email
	 */
  public function __construct(string $email) {
    $this->email = $email;
  }

  /**
   * @return string
   */
  public function getEmail(): string {
    return $this->email;
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      'email' => $this->email,
    ];
  }

	/**
	 * @param array $attributes
	 * @return static
	 */
  public static function createFromArray(array $attributes): self {
    return new self(
      (string)ArrayHelper::getNotEmptyValue($attributes, 'email', '')
    );
  }
}