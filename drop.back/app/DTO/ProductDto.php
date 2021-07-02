<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use App\Models\Category;

class ProductDto {
	/**
	 * @var bool
	 */
	public $available = false;

	/**
	 * @var int
	 */
	public $art;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var float
	 */
	public $price;

	/**
	 * @var float
	 */
	public $priceOld;

	/**
	 * @var float
	 */
	public $oldPriceDrop;

	/**
	 * @var float
	 */
	public $oldPriceOpt;

	/**
	 * @var integer
	 */
	public $stockQuantity;

	/**
	 * @var integer
	 */
	public $categoryId;

	/**
	 * @var string
	 */
	public $description;

	/**
	 * @var array
	 */
	protected $params;

	/**
	 * @var string
	 */
	public $vendor;

	/**
	 * @var array
	 */
	protected $pictures;

	/**
	 * ProductDto constructor.
	 *
	 * @param bool $available
	 * @param int $art
	 * @param string $name
	 * @param float $price
	 * @param float $priceOld
	 * @param float $oldPriceDrop
	 * @param float $oldPriceOpt
	 * @param int $stockQuantity
	 * @param int|null $categoryId
	 * @param string $description
	 * @param array $params
	 * @param string $vendor
	 * @param array $pictures
	 */
	public function __construct(bool $available,
	                            int $art,
	                            string $name,
	                            float $price,
	                            float $priceOld,
	                            float $oldPriceDrop,
	                            float $oldPriceOpt,
	                            int $stockQuantity,
	                            ?int $categoryId,
	                            string $description,
	                            array $params,
	                            string $vendor,
	                            array $pictures = []) {
		$this->available = $available;
		$this->art = $art;
		$this->name = $name;
		$this->price = $price;
		$this->priceOld = $priceOld;
		$this->oldPriceDrop = $oldPriceDrop;
		$this->oldPriceOpt = $oldPriceOpt;
		$this->stockQuantity = $stockQuantity;
		$this->categoryId = $categoryId;
		$this->description = $description;
		$this->params = $params;
		$this->vendor = $vendor;
		$this->pictures = $pictures;
	}

	/**
	 * @return bool
	 */
	public function isAvailable(): bool {
		return $this->available;
	}

	/**
	 * @return int
	 */
	public function getArt(): int {
		return $this->art;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @return float
	 */
	public function getPrice(): float {
		return $this->price;
	}

	/**
	 * @return float
	 */
	public function getPriceOld(): float {
		return $this->priceOld;
	}

	/**
	 * @return float
	 */
	public function getOldPriceDrop(): float {
		return $this->oldPriceDrop;
	}

	/**
	 * @return float
	 */
	public function getOldPriceOpt(): float {
		return $this->oldPriceOpt;
	}

	/**
	 * @return int
	 */
	public function getStockQuantity(): int {
		return $this->stockQuantity;
	}

	/**
	 * @return integer|null
	 */
	public function getCategoryId(): ?int {
		return $this->categoryId;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}

	/**
	 * @return array
	 */
	public function getParams(): array {
		return $this->params;
	}

	/**
	 * @return string
	 */
	public function getVendor(): string {
		return $this->vendor;
	}

	/**
	 * @return array
	 */
	public function getPictures(): array {
		return $this->pictures;
	}

	/**
	 * @return bool
	 */
	public function hasPictures(): bool {
		return !empty($this->pictures);
	}

	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'available' => $this->available,
			'art' => $this->art,
			'name' => $this->name,
			'price' => $this->price,
			'price_old' => $this->priceOld,
			'old_price_drop' => $this->oldPriceDrop,
			'old_price_opt' => $this->oldPriceOpt,
			'stock_quantity' => $this->stockQuantity,
			'category_id' => $this->categoryId,
			'description' => $this->description,
			'vendor' => $this->vendor
		];
	}

	/**
	 * @param array $attributes
	 * @return ProductDto
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
      (bool)ArrayHelper::getNotEmptyValue($attributes, 'available', false),
      (int)ArrayHelper::getNotEmptyValue($attributes, 'art') ?:null,
      (string)ArrayHelper::getNotEmptyValue($attributes, 'name', ''),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'price', 0.00),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'price_old', 0.00),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'old_price_drop', 0.00),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'old_price_opt', 0.00),
      (int)ArrayHelper::getNotEmptyValue($attributes, 'stock_quantity')?: null,
      (int)ArrayHelper::getNotEmptyValue($attributes, 'category_id')?: null,
      (string)ArrayHelper::getNotEmptyValue($attributes, 'description',''),
			ArrayHelper::getNotEmptyValue($attributes, 'params', []),
			ArrayHelper::getNotEmptyValue($attributes, 'vendor', ''),
			ArrayHelper::getNotEmptyValue($attributes, 'pictures', [])
		);
	}

}