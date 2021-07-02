<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;

class ResultDto implements Arrayable {
  /**
   * @var integer
   */
  protected $categoryId;

  /**
   * @var float
   */
  protected $length;

  /**
   * @var float
   */
  protected $width;

  /**
   * @var float
   */
  protected $height;

  /**
   * @var float
   */
  protected $diameter;

  /**
   * @var float
   */
  protected $depth;

  /**
   * @var integer
   */
  protected $quantity;

	/**
	 * ResultDto constructor.
	 *
	 * @param int $categoryId
	 * @param float $length
	 * @param float $width
	 * @param float $height
	 * @param float $diameter
	 * @param float $depth
	 * @param int $quantity
	 */
  public function __construct(int $categoryId,
                              float $length,
                              float $width,
                              float $height,
                              float $diameter,
                              float $depth,
                              int $quantity) {
    $this->categoryId = $categoryId;
    $this->length = $length;
    $this->width = $width;
    $this->height = $height;
    $this->diameter = $diameter;
    $this->depth = $depth;
    $this->quantity = $quantity;
  }

	/**
	 * @return int
	 */
	public function getCategoryId() {
  	return $this->categoryId;
	}

	/**
	 * @return float
	 */
	public function getLength() {
  	return $this->length;
	}

	/**
	 * @return float
	 */
	public function getWidth() {
  	return $this->width;
	}

	/**
	 * @return float
	 */
	public function getHeight() {
  	return $this->height;
	}

	/**
	 * @return float
	 */
	public function getDiameter() {
  	return $this->diameter;
	}

	/**
	 * @return float
	 */
	public function getDepth() {
  	return $this->depth;
	}

	/**
	 * @return int
	 */
	public function getQuantity() {
  	return $this->quantity;
	}

  /**
   * @return array
   */
  public function toArray(): array {
    return [
	    'category_id' => $this->categoryId,
			'length' => $this->length,
			'width' => $this->width,
			'height' => $this->height,
			'diameter' => $this->diameter,
			'depth' => $this->depth,
			'quantity' => $this->quantity,
    ];
  }

	/**
	 * @return array
	 */
  public function getParamsToCalculate(): array {
  	$allParams = $this->toArray();
  	return array_splice($allParams, -6);
  }

	/**
	 * @param array $attributes
	 * @return static
	 */
  public static function createFromArray(array $attributes): self {
    return new self(
      (int)ArrayHelper::getNotEmptyValue($attributes, 'category_id') ?: null,
      (float)ArrayHelper::getNotEmptyValue($attributes, 'length', 0.00),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'width', 0.00),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'height', 0.00),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'diameter', 0.00),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'depth', 0.00),
      (int)ArrayHelper::getNotEmptyValue($attributes, 'quantity') ?: null
    );
  }
}