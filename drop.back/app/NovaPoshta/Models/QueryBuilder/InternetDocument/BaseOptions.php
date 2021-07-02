<?php

namespace App\NovaPoshta\Models\QueryBuilder\InternetDocument;

use App\Helpers\DateHelper;
use App\NovaPoshta\Enums\CargoTypes;
use App\NovaPoshta\Enums\PayerTypes;
use App\NovaPoshta\Enums\PaymentForms;
use App\NovaPoshta\Enums\ServiceTypes;
use App\NovaPoshta\Models\QueryBuilder\IQueryBuilder;

class BaseOptions implements IQueryBuilder {
  /**
   * Целое число, объявленная стоимость (если объявленная стоимость не указана, API автоматически подставит минимальную объявленную цену - 300.00.)
   *
   * @var float
   */
  protected $cost;

  /**
   * @var string
   */
  protected $payerType = PayerTypes::SENDER;

  /**
   * @var string
   */
  protected $paymentMethod = PaymentForms::CASH;

  /**
   * @var string
   */
  protected $cargoType = CargoTypes::CARGO;

  /**
   * Значение из справочника Технология доставки.
   *
   * @var string
   */
  protected $serviceType = ServiceTypes::WAREHOUSE_WAREHOUSE;

  /**
   * min - 0,1 Вес фактический.
   *
   * @var float
   */
  protected $weight = 10;

  /**
   * Целое число, количество мест отправления.
   *
   * @var int
   */
  protected $seatsAmount = 1;

  /**
   * Объем общий, м.куб (min - 0.0004), обязательно для заполнения, если не указаны значения OptionsSeat.
   *
   * @var float
   */
  protected $volumeGeneral = 0.1;

  /**
   * Текстовое поле, вводиться для доп. описания.
   *
   * @var string
   */
  protected $description = "Одежда";

  /**
   * @var DateHelper
   */
  protected $dateTime;

  /**
   * BaseOptions constructor.
   *
   * @param float $cost
   * @param string $payerType
   * @param string $paymentMethod
   * @param string $cargoType
   * @param string $serviceType
   * @param float $weight
   * @param int $seatsAmount
   * @param float $volumeGeneral
   * @param string $description
   * @param DateHelper $dateTime
   */
  public function __construct(float $cost,
                              string $payerType = PayerTypes::SENDER,
                              string $paymentMethod = PaymentForms::CASH,
                              string $cargoType = CargoTypes::CARGO,
                              string $serviceType = ServiceTypes::WAREHOUSE_WAREHOUSE,
                              float $weight = 10,
                              int $seatsAmount = 1,
                              float $volumeGeneral = 0.1,
                              string $description = 'Одежда',
                              DateHelper $dateTime = null) {
    $this->cost = $cost;
    $this->payerType = $payerType;
    $this->paymentMethod = $paymentMethod;
    $this->cargoType = $cargoType;
    $this->serviceType = $serviceType;
    $this->weight = $weight;
    $this->seatsAmount = $seatsAmount;
    $this->volumeGeneral = $volumeGeneral;
    $this->description = $description;
    $this->dateTime = $dateTime ?: DateHelper::now();
  }

  /**
   * @return float
   */
  public function getCost(): float {
    return $this->cost;
  }

  /**
   * @param float $cost
   * @return self
   */
  public function setCost(float $cost): self {
    $this->cost = $cost;
    return $this;
  }

  /**
   * @return string
   */
  public function getPayerType(): string {
    return $this->payerType;
  }

  /**
   * @param string $payerType
   * @return self
   */
  public function setPayerType(string $payerType): self {
    $this->payerType = $payerType;
    return $this;
  }

  /**
   * @return string
   */
  public function getPaymentMethod(): string {
    return $this->paymentMethod;
  }

  /**
   * @param string $paymentMethod
   * @return self
   */
  public function setPaymentMethod(string $paymentMethod): self {
    $this->paymentMethod = $paymentMethod;
    return $this;
  }

  /**
   * @return string
   */
  public function getCargoType(): string {
    return $this->cargoType;
  }

  /**
   * @param string $cargoType
   * @return self
   */
  public function setCargoType(string $cargoType): self {
    $this->cargoType = $cargoType;
    return $this;
  }

  /**
   * @return string
   */
  public function getServiceType(): string {
    return $this->serviceType;
  }

  /**
   * @param string $serviceType
   * @return self
   */
  public function setServiceType(string $serviceType): self {
    $this->serviceType = $serviceType;
    return $this;
  }

  /**
   * @return float
   */
  public function getWeight(): float {
    return $this->weight;
  }

  /**
   * @param float $weight
   * @return self
   */
  public function setWeight(float $weight): self {
    $this->weight = $weight;
    return $this;
  }

  /**
   * @return int
   */
  public function getSeatsAmount(): int {
    return $this->seatsAmount;
  }

  /**
   * @param int $seatsAmount
   * @return self
   */
  public function setSeatsAmount(int $seatsAmount): self {
    $this->seatsAmount = $seatsAmount;
    return $this;
  }

  /**
   * @return float
   */
  public function getVolumeGeneral(): float {
    return $this->volumeGeneral;
  }

  /**
   * @param float $volumeGeneral
   * @return self
   */
  public function setVolumeGeneral(float $volumeGeneral): self {
    $this->volumeGeneral = $volumeGeneral;
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
   * @return DateHelper
   */
  public function getDateTime(): DateHelper {
    return $this->dateTime;
  }

  /**
   * @param DateHelper $dateTime
   * @return self
   */
  public function setDateTime(DateHelper $dateTime): self {
    $this->dateTime = $dateTime;
    return $this;
  }

  /**
   * @return bool
   */
  public function hasAllForSendRequest(): bool {
    return true;
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return [
      "PayerType"     => $this->payerType,
      "PaymentMethod" => $this->paymentMethod,
      "DateTime"      => $this->dateTime->format('d.m.Y'),
      "CargoType"     => $this->cargoType,
      "VolumeGeneral" => $this->volumeGeneral,
      "Weight"        => $this->weight,
      "ServiceType"   => $this->serviceType,
      "SeatsAmount"   => $this->seatsAmount,
      "Description"   => $this->description,
      "Cost"          => $this->cost,
    ];
  }
}