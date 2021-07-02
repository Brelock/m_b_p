<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

class EditOrderProductDto implements Arrayable {
  /**
   * @var int
   */
  protected $quantity = 1;

  /**
   * OrderProductDto constructor.
   *
   * @param int $quantity
   */
  public function __construct(int $quantity) {
    $this->quantity = $quantity;
  }

  /**
   * @return int
   */
  public function getQuantity(): int {
    return $this->quantity;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return ['quantity' => $this->quantity];
  }

  /**
   * @param array $attributes
   * @return EditOrderProductDto
   */
  public static function createFromArray(array $attributes) : self {
    return new self(Arr::get($attributes, 'quantity', 1));
  }
}