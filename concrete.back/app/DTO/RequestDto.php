<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;

class RequestDto implements Arrayable {
  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $email;

  /**
   * @var string
   */
  protected $question;

	/**
	 * RequestDto constructor.
	 *
	 * @param string $name
	 * @param string $email
	 * @param string $question
	 */
  public function __construct(string $name,
                              string $email,
                              string $question) {
    $this->name = $name;
    $this->email = $email;
    $this->question = $question;
  }

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
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
  public function getQuestion(): string {
    return $this->question;
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      'name' => $this->name,
      'email' => $this->email,
      'question' => $this->question,
    ];
  }

	/**
	 * @param array $attributes
	 * @return static
	 */
  public static function createFromArray(array $attributes): self {
    return new self(
      (string)ArrayHelper::getNotEmptyValue($attributes, 'name', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'email', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'question', '')
    );
  }
}