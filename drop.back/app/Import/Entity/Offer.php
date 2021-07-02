<?php

namespace App\Import\Entity;

use App\Import\Collection\OfferParamCollection;
use App\Import\Collection\OfferPictureCollection;
use Illuminate\Support\Arr;

class Offer extends BaseEntity {
  /**
   * @var string
   */
  protected $id;

  /**
   * @var bool
   */
  protected $available = false;

  /**
   * @var int
   */
  protected $art;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var float
   */
  protected $price;

  /**
   * @var float
   */
  protected $priceOld;

  /**
   * @var float
   */
  protected $oldPriceDrop;

  /**
   * @var float
   */
  protected $oldPriceOpt;

  /**
   * @var int
   */
  protected $stockQuantity;

  /**
   * @var string
   */
  protected $currencyId;

  /**
   * @var string
   */
  protected $categoryId;

  /**
   * @var string
   */
  protected $description;

  /**
   * @var OfferParamCollection
   */
  protected $params;

  /**
   * @var string
   */
  protected $vendor;

  /**
   * @var OfferPictureCollection
   */
  protected $pictures;

	/**
	 * Offer constructor.
	 *
	 * @param string $id
	 * @param bool $available
	 * @param int $art
	 * @param string $name
	 * @param float $price
	 * @param float $priceOld
	 * @param float $oldPriceDrop
	 * @param float $oldPriceOpt
	 * @param int $stockQuantity
	 * @param string $currencyId
	 * @param string $categoryId
	 * @param string $description
	 * @param OfferParamCollection $params
	 * @param string $vendor
	 * @param OfferPictureCollection $pictures
	 */
  public function __construct(string $id,
                              bool $available,
                              int $art,
                              string $name,
                              float $price,
                              float $priceOld,
                              float $oldPriceDrop,
                              float $oldPriceOpt,
                              int $stockQuantity,
                              string $currencyId,
                              string $categoryId,
                              string $description,
                              OfferParamCollection $params,
                              string $vendor,
                              OfferPictureCollection $pictures) {
    $this->id = $id;
    $this->available = $available;
    $this->art = $art;
    $this->name = $name;
    $this->price = $price;
    $this->priceOld = $priceOld;
    $this->oldPriceDrop = $oldPriceDrop;
    $this->oldPriceOpt = $oldPriceOpt;
    $this->stockQuantity = $stockQuantity;
    $this->currencyId = $currencyId;
    $this->categoryId = $categoryId;
    $this->description = $description;
    $this->params = $params;
    $this->vendor = $vendor;
    $this->pictures = $pictures;
  }

  /**
   * @return string
   */
  public function getId(): string {
    return $this->id;
  }

  /**
   * @param string $id
   * @return self
   */
  public function setId(string $id): self {
    $this->id = $id;
    return $this;
  }

  /**
   * @return bool
   */
  public function isAvailable(): bool {
    return $this->available;
  }

  /**
   * @param bool $available
   * @return self
   */
  public function setAvailable(bool $available): self {
    $this->available = $available;
    return $this;
  }

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * @param string $name
   * @return self
   */
  public function setName(string $name): self {
    $this->name = $name;
    return $this;
  }

  /**
   * @return int
   */
  public function getArt(): int {
    return $this->art;
  }

  /**
   * @param int $art
   * @return self
   */
  public function setArt(int $art): self {
    $this->art = $art;
    return $this;
  }

  /**
   * @return float
   */
  public function getPrice(): float {
    return $this->price;
  }

  /**
   * @param float $price
   * @return self
   */
  public function setPrice(float $price): self {
    $this->price = $price;
    return $this;
  }

  /**
   * @return float
   */
  public function getPriceOld(): float {
    return $this->priceOld;
  }

  /**
   * @param float $priceOld
   * @return self
   */
  public function setPriceOld(float $priceOld): self {
    $this->priceOld = $priceOld;
    return $this;
  }

  /**
   * @return float
   */
  public function getOldPriceDrop(): float {
    return $this->oldPriceDrop;
  }

  /**
   * @param float $oldPriceDrop
   * @return self
   */
  public function setOldPriceDrop(float $oldPriceDrop): self {
    $this->oldPriceDrop = $oldPriceDrop;
    return $this;
  }

  /**
   * @return float
   */
  public function getOldPriceOpt(): float {
    return $this->oldPriceOpt;
  }

  /**
   * @param float $oldPriceOpt
   * @return self
   */
  public function setOldPriceOpt(float $oldPriceOpt): self {
    $this->oldPriceOpt = $oldPriceOpt;
    return $this;
  }

  /**
   * @return int
   */
  public function getStockQuantity(): int {
    return $this->stockQuantity;
  }

  /**
   * @param int $stockQuantity
   * @return self
   */
  public function setStockQuantity(int $stockQuantity): self {
    $this->stockQuantity = $stockQuantity;
    return $this;
  }

  /**
   * @return string
   */
  public function getCurrencyId(): string {
    return $this->currencyId;
  }

  /**
   * @param string $currencyId
   * @return self
   */
  public function setCurrencyId(string $currencyId): self {
    $this->currencyId = $currencyId;
    return $this;
  }

  /**
   * @return string
   */
  public function getCategoryId(): string {
    return $this->categoryId;
  }

  /**
   * @param string $categoryId
   * @return self
   */
  public function setCategoryId(string $categoryId): self {
    $this->categoryId = $categoryId;
    return $this;
  }

  /**
   * @return string
   */
  public function getDescription(): string {
    return $this->description;
  }

  /**
   * @param string $description
   * @return self
   */
  public function setDescription(string $description): self {
    $this->description = $description;
    return $this;
  }

  /**
   * @return OfferParamCollection
   */
  public function getParams(): OfferParamCollection {
    return $this->params;
  }

  /**
   * @return array
   */
  public function getParamsTitles(): array {
    return $this->params->getTitles();
  }

  /**
   * @param OfferParamCollection $params
   * @return self
   */
  public function setParams(OfferParamCollection $params): self {
    $this->params = $params;
    return $this;
  }

  /**
   * @return string
   */
  public function getVendor(): string {
    return $this->vendor;
  }

  /**
   * @param string $vendor
   * @return self
   */
  public function setVendor(string $vendor): self {
    $this->vendor = $vendor;
    return $this;
  }

  /**
   * @return OfferPictureCollection
   */
  public function getPictures(): OfferPictureCollection {
    return $this->pictures;
  }

  /**
   * @param OfferPictureCollection $pictures
   * @return self
   */
  public function setPictures(OfferPictureCollection $pictures): self {
    $this->pictures = $pictures;
    return $this;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      'id' => $this->id,
      'available' => $this->available,
      'art' => $this->art,
      'name' => $this->name,
      'price' => $this->price,
      'price_old' => $this->priceOld,
      'old_price_drop' => $this->oldPriceDrop,
      'old_price_opt' => $this->oldPriceOpt,
      'stock_quantity' => $this->stockQuantity,
      'currency_id' => $this->currencyId,
      'category_id' => $this->categoryId,
      'description' => $this->description,
      'params' => $this->params->toArray(),
      'vendor' => $this->vendor,
      'pictures' => $this->pictures->toArray(),
    ];
  }

  /**
   * @return array
   */
  public function toFillableProductAttributes() : array {
    return [
      'external_id' => $this->id,
      'available' => $this->available,
      'art' => $this->art,
      'name' => $this->name,
      'price' => $this->price,
      'price_old' => $this->priceOld,
      'old_price_drop' => $this->oldPriceDrop,
      'old_price_opt' => $this->oldPriceOpt,
      'stock_quantity' => $this->stockQuantity,
      'description' => $this->description,
      'vendor' => $this->vendor,
    ];
  }

  /**
   * @param array $attributes
   *
   * @return BaseEntity
   */
  public static function mapFromArray(array $attributes): BaseEntity {
    return new self(
      (string)(Arr::get($attributes, 'id') ?: ''),
      (bool)Arr::get($attributes, 'available', false),
      (int)Arr::get($attributes, 'art'),
      (string)(Arr::get($attributes, 'name') ?: ''),
      (float)(Arr::get($attributes, 'price') ?: 0.00),
      (float)(Arr::get($attributes, 'price_old') ?: 0.00),
      (float)(Arr::get($attributes, 'old_price_drop') ?: 0.00),
      (float)(Arr::get($attributes, 'old_price_opt') ?: 0.00),
      (int)Arr::get($attributes, 'stock_quantity'),
      (string)(Arr::get($attributes, 'currency_id') ?: ''),
      (string)(Arr::get($attributes, 'category_id') ?: ''),
      (string)(Arr::get($attributes, 'description') ?: ''),
      new OfferParamCollection(Arr::wrap(Arr::get($attributes, 'params', []))),
      (string)(Arr::get($attributes, 'vendor') ?: ''),
      new OfferPictureCollection(Arr::wrap(Arr::get($attributes, 'pictures', [])))
    );
  }

  /**
   * @return BaseEntity
   */
  public static function createNullObject(): BaseEntity {
    return static::mapFromArray([]);
  }
}