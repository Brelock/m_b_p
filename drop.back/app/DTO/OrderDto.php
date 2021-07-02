<?php

namespace App\DTO;

use App\Enums\DeliveryTypes;
use App\Enums\PaymentTypes;
use App\Helpers\ArrayHelper;
use App\Models\Order;
use Illuminate\Contracts\Support\Arrayable;

class OrderDto implements Arrayable {
  /**
   * @var integer
   */
  public $paymentType;

  /**
   * @var integer
   */
  public $deliveryType;

  /**
   * @var string|null
   */
  public $dropshipperFullName;

  /**
   * @var string|null
   */
  public $dropshipperPhoneNumber;

  /**
   * @var string|null
   */
  public $deliveryGeneralInfo;

  /**
   * @var string|null
   */
  public $novaposhtaFirstName;

  /**
   * @var string|null
   */
  protected $novaposhtaMiddleName;

  /**
   * @var string|null
   */
  public $novaposhtaLastName;

  /**
   * @var string|null
   */
  public $novaposhtaPhoneNumber;

  /**
   * @var integer|null
   */
  public $novaposhtaCityId;

  /**
   * @var integer|null
   */
  public $novaposhtaWarehouseId;

  /**
   * @var string|null
   */
  public $cookieHash;

  /**
   * OrderDto constructor.
   *
   * @param int $paymentType
   * @param int $deliveryType
   * @param null|string $dropshipperFullName
   * @param null|string $dropshipperPhoneNumber
   * @param null|string $deliveryGeneralInfo
   * @param null|string $novaposhtaFirstName
   * @param null|string $novaposhtaMiddleName
   * @param null|string $novaposhtaLastName
   * @param null|string $novaposhtaPhoneNumber
   * @param int|null $novaposhtaCityId
   * @param int|null $novaposhtaWarehouseId
   * @param string $cookieHash
   */
  public function __construct(int $paymentType = PaymentTypes::CASH_PAYMENT,
                              int $deliveryType = DeliveryTypes::NOVA_POSHTA,
                              ?string $dropshipperFullName = null,
                              ?string $dropshipperPhoneNumber = null,
                              ?string $deliveryGeneralInfo = null,
                              ?string $novaposhtaFirstName = null,
                              ?string $novaposhtaMiddleName = null,
                              ?string $novaposhtaLastName = null,
                              ?string $novaposhtaPhoneNumber = null,
                              ?int $novaposhtaCityId = null,
                              ?int $novaposhtaWarehouseId = null,
                              ?string $cookieHash = null) {
    $this->paymentType = $paymentType;
    $this->deliveryType = $deliveryType;
    $this->dropshipperFullName = $dropshipperFullName;
    $this->dropshipperPhoneNumber = $dropshipperPhoneNumber;
    $this->deliveryGeneralInfo = $deliveryGeneralInfo;
    $this->novaposhtaFirstName = $novaposhtaFirstName;
    $this->novaposhtaMiddleName = $novaposhtaMiddleName;
    $this->novaposhtaLastName = $novaposhtaLastName;
    $this->novaposhtaPhoneNumber = $novaposhtaPhoneNumber;
    $this->novaposhtaCityId = $novaposhtaCityId;
    $this->novaposhtaWarehouseId = $novaposhtaWarehouseId;
    $this->cookieHash = $cookieHash;
  }

  /**
   * @return int
   */
  public function getPaymentType(): int {
    return $this->paymentType;
  }

  /**
   * @return int
   */
  public function getDeliveryType(): int {
    return $this->deliveryType;
  }

  /**
   * @return null|string
   */
  public function getDropshipperFullName(): ?string {
    return $this->dropshipperFullName;
  }

  /**
   * @return null|string
   */
  public function getDropshipperPhoneNumber(): ?string {
    return $this->dropshipperPhoneNumber;
  }

  /**
   * @return null|string
   */
  public function getDeliveryGeneralInfo(): ?string {
    return $this->deliveryGeneralInfo;
  }

  /**
   * @return null|string
   */
  public function getNovaposhtaFirstName(): ?string {
    return $this->novaposhtaFirstName;
  }

  /**
   * @return null|string
   */
  public function getNovaposhtaMiddleName(): ?string {
    return $this->novaposhtaMiddleName;
  }

  /**
   * @return null|string
   */
  public function getNovaposhtaLastName(): ?string {
    return $this->novaposhtaLastName;
  }

  /**
   * @return null|string
   */
  public function getNovaposhtaPhoneNumber(): ?string {
    return $this->novaposhtaPhoneNumber;
  }

  /**
   * @return int|null
   */
  public function getNovaposhtaCityId(): ?int {
    return $this->novaposhtaCityId;
  }

  /**
   * @return int|null
   */
  public function getNovaposhtaWarehouseId(): ?int {
    return $this->novaposhtaWarehouseId;
  }

  /**
   * @return null|string
   */
  public function getCookieHash(): ?string {
    return $this->cookieHash;
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      'cookie_hash' => $this->cookieHash,
      'dropshipper_full_name' => $this->dropshipperFullName,
      'dropshipper_phone_number' => $this->dropshipperPhoneNumber,
      'payment_type' => $this->paymentType,
      'delivery_type' => $this->deliveryType,
      'delivery_general_info' => $this->deliveryGeneralInfo,
      'novaposhta_first_name' => $this->novaposhtaFirstName,
      'novaposhta_middle_name' => $this->novaposhtaMiddleName,
      'novaposhta_last_name' => $this->novaposhtaLastName,
      'novaposhta_phone_number' => $this->novaposhtaPhoneNumber,
      'novaposhta_city_id' => $this->novaposhtaCityId,
      'novaposhta_warehouse_id' => $this->novaposhtaWarehouseId,
    ];
  }

  /**
   * @param array $attributes
   * @return OrderDto
   */
  public static function createFromArray(array $attributes): self {
    return new self(
      (int)ArrayHelper::getNotEmptyValue($attributes, 'payment_type', PaymentTypes::CASH_PAYMENT),
      (int)ArrayHelper::getNotEmptyValue($attributes, 'delivery_type', DeliveryTypes::NOVA_POSHTA),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'dropshipper_full_name', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'dropshipper_phone_number', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'delivery_general_info', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'novaposhta_first_name', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'novaposhta_middle_name', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'novaposhta_last_name', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'novaposhta_phone_number', ''),
      ((int)ArrayHelper::getNotEmptyValue($attributes, 'novaposhta_city_id') ?: null),
      ((int)ArrayHelper::getNotEmptyValue($attributes, 'novaposhta_warehouse_id') ?: null),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'cookie_hash', '')
    );
  }

  /**
   * @param Order $order
   * @return OrderDto
   */
  public static function createFromOrder(Order $order) : self {
    return static::createFromArray($order->toArray());
  }
}