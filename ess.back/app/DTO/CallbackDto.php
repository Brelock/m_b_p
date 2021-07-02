<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;

class CallbackDto implements Arrayable {
  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $phone;

  /**
   * @var string
   */
  protected $email;

  /**
   * @var string
   */
  protected $region;

  /**
   * @var string
   */
  protected $message;

  /**
   * @var integer
   */
  protected $type;

	/**
	 * CallbackDto constructor.
	 *
	 * @param int $type
	 * @param string|null $name
	 * @param string|null $phone
	 * @param string|null $email
	 * @param string|null $region
	 * @param string|null $message
	 */
  public function __construct(int $type,
                              string $name = null,
  	                          string $phone = null,
  	                          string $email = null,
  	                          string $region = null,
	                            string $message = null) {

	  $this->type = $type;
	  $this->name = $name;
  	$this->phone = $phone;
  	$this->email = $email;
  	$this->region = $region;
  	$this->message = $message;
  }

	/**
	 * @return int
	 */
  public function getType(): int {
    return $this->type;
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
  public function getPhone(): string {
    return $this->phone;
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
  public function getRegion(): string {
    return $this->region;
  }

  /**
   * @return string
   */
  public function getMessage(): string {
    return $this->message;
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      'name' => $this->name,
      'phone' => $this->phone,
      'email' => $this->email,
      'region' => $this->region,
      'message' => $this->message,
      'type' => $this->type
    ];
  }

	/**
	 * @param array $attributes
	 * @return static
	 */
  public static function createFromArray(array $attributes): self {
    return new self(
      (int)ArrayHelper::getNotEmptyValue($attributes, 'type', ''),
	    (string)ArrayHelper::getNotEmptyValue($attributes, 'name', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'phone', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'email', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'region', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'message', '')
    );
  }
}