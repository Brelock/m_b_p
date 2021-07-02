<?php

namespace App\NovaPoshta\Models\QueryBuilder\InternetDocument;

use App\NovaPoshta\Enums\CounterpartyTypes;
use App\NovaPoshta\Models\QueryBuilder\IQueryBuilder;

class RecipientWarehouse implements IQueryBuilder {
  /**
   * Идентификатор города получателя (УКАЗЫВАЕТЬСЯ СТРОКОЙ).
   *
   * @var string
   */
  protected $cityName;

  /**
   * Идентификатор номера отделения (УКАЗЫВАЕТЬСЯ СТРОКОЙ).
   *
   * @var string
   */
  protected $warehouseNumber;

  /**
   * Идентификатор ФИО получателя (УКАЗЫВАЕТЬСЯ СТРОКОЙ).
   *
   * @var string
   */
  protected $fullName;

  /**
   * Телефон получателя.
   *
   * @var string
   */
  protected $phone;

  /**
   * Тип получателя.
   *
   * @var string
   */
  protected $type = CounterpartyTypes::PRIVATE_PERSON;

  /**
   * Идентификатор области (УКАЗЫВАЕТЬСЯ СТРОКОЙ).
   *
   * @var string
   */
  protected $area;

  /**
   * Идентификатор района (УКАЗЫВАЕТЬСЯ СТРОКОЙ).
   *
   * @var string
   */
  protected $areaRegions;

  /**
   * Идентификатор номера улицы (УКАЗЫВАЕТЬСЯ СТРОКОЙ).
   *
   * @var string
   */
  protected $streetNumber;

  /**
   * Идентификатор этажа (УКАЗЫВАЕТЬСЯ СТРОКОЙ).
   *
   * @var string
   */
  protected $flat;

  /**
   * RecipientWarehouse constructor.
   *
   * @param string $cityName
   * @param string $warehouseNumber
   * @param string $fullName
   * @param string $phone
   * @param string $type
   * @param string $area
   * @param string $areaRegions
   * @param string $streetNumber
   * @param string $flat
   */
  public function __construct(string $cityName,
                              string $warehouseNumber,
                              string $fullName,
                              string $phone,
                              string $type = CounterpartyTypes::PRIVATE_PERSON,
                              string $area = "",
                              string $areaRegions = "",
                              string $streetNumber = "",
                              string $flat = "") {
    $this->cityName = $cityName;
    $this->warehouseNumber = $warehouseNumber;
    $this->fullName = $fullName;
    $this->phone = $phone;
    $this->type = $type;
    $this->area = $area;
    $this->areaRegions = $areaRegions;
    $this->streetNumber = $streetNumber;
    $this->flat = $flat;
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
      "RecipientCityName"    => $this->cityName,
      "RecipientArea"        => $this->area,
      "RecipientAreaRegions" => $this->areaRegions,
      "RecipientAddressName" => $this->warehouseNumber,
      "RecipientHouse"       => $this->streetNumber,
      "RecipientFlat"        => $this->flat,
      "RecipientName"        => $this->fullName,
      "RecipientType"        => $this->type,
      "RecipientsPhone"      => $this->phone,
    ];
  }
}