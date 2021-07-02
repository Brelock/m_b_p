<?php

namespace App\NovaPoshta\Entity;

use Illuminate\Support\Arr;

class CreatedInternetDocument extends BaseEntity {
  /**
   * Идентификатор экспресс-накладной.
   *
   * @var string
   */
  protected $ref;

  /**
   * Стоимость.
   *
   * @var int
   */
  protected $cost;

  /**
   * Прогноз даты доставки.
   *
   * @var string
   */
  protected $estimatedDeliveryDate;

  /**
   * Номер экспресс-накладной.
   *
   * @var string
   */
  protected $ttn;

  /**
   * Тип экспресс-накладной.
   *
   * @var string
   */
  protected $type = 'InternetDocument';

  /**
   * InternetDocument constructor.
   *
   * @param string $ref
   * @param int $cost
   * @param string $estimatedDeliveryDate
   * @param string $ttn
   * @param string $type
   */
  public function __construct(string $ref,
                              int $cost,
                              string $estimatedDeliveryDate,
                              string $ttn,
                              string $type) {
    $this->ref = $ref;
    $this->cost = $cost;
    $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    $this->ttn = $ttn;
    $this->type = $type;
  }

  /**
   * @return string
   */
  public function getRef(): string {
    return $this->ref;
  }

  /**
   * @return int
   */
  public function getCost(): int {
    return $this->cost;
  }

  /**
   * @return string
   */
  public function getEstimatedDeliveryDate(): string {
    return $this->estimatedDeliveryDate;
  }

  /**
   * @return string
   */
  public function getTtn(): string {
    return $this->ttn;
  }

  /**
   * @return string
   */
  public function getType(): string {
    return $this->type;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      "Ref" => $this->ref,
      "CostOnSite" => $this->cost,
      "EstimatedDeliveryDate" => $this->estimatedDeliveryDate,
      "IntDocNumber" => $this->ttn,
      "TypeDocument" => $this->type,
    ];
  }

  /**
   * @param array $attributes
   * @return BaseEntity
   */
  public static function createFromArray(array $attributes): BaseEntity {
    return new self(
      (string)Arr::get($attributes, 'Ref'),
      ((int)Arr::get($attributes, 'CostOnSite') ?: null),
      (string)Arr::get($attributes, 'EstimatedDeliveryDate'),
      (string)Arr::get($attributes, 'IntDocNumber'),
      (string)Arr::get($attributes, 'TypeDocument')
    );
  }
}