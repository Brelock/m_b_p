<?php

namespace App\NovaPoshta\Entity;

use Illuminate\Support\Arr;

/**
 * Отделения.
 */
class Warehouse extends BaseEntity {
  /**
   * Код отделения.
   *
   * @var string
   */
  protected $siteKey;

  /**
   * Название отделения на Украинском.
   *
   * @var string
   */
  protected $description;

  /**
   * Название отделения на русском.
   *
   * @var string
   */
  protected $descriptionRu;

  /**
   * @var string
   */
  protected $phone;

  /**
   * Тип отделения.
   *
   * @var string
   */
  protected $typeOfWarehouse;

  /**
   * Идентификатор отделения.
   *
   * @var string
   */
  protected $ref;

  /**
   * Номер отделения.
   *
   * @var int
   */
  protected $number;

  /**
   * Идентификатор населенного пункта.
   *
   * @var string
   */
  protected $cityRef;

  /**
   * Название населенного пункта на Украинском.
   *
   * @var string
   */
  protected $cityDescription;

  /**
   * Название населенного пункта на русском.
   *
   * @var string
   */
  protected $cityDescriptionRu;

  /**
   * Долгота.
   *
   * @var string
   */
  protected $longitude;

  /**
   * Широта.
   *
   * @var string
   */
  protected $latitude;

  /**
   * (1/0) Наличие кассы Пост-Финанс.
   *
   * @var int
   */
  protected $postFinance = 1;

  /**
   * (1/0) Наличие велосипедных парковок.
   *
   * @var int
   */
  protected $bicycleParking = 0;

  /**
   * (1/0) Наличие пос-терминала на отделении
   *
   * @var int
   */
  protected $posTerminal = 1;

  /**
   * (1/0) Возможность оформления Международного отправления.
   *
   * @var int
   */
  protected $internationalShipping = 0;

  /**
   * Максимальный вес отправления.
   *
   * @var int
   */
  protected $totalMaxWeightAllowed = 0;

  /**
   * Максимальный вес одного места отправления.
   *
   * @var int
   */
  protected $placeMaxWeightAllowed = 0;

  /**
   * График приема отправлений.
   *
   * @var array
   */
  protected $reception = [];

  /**
   * График отправки день в день.
   *
   * @var array
   */
  protected $delivery = [];

  /**
   * График работы.
   *
   * @var array
   */
  protected $schedule = [];

  /**
   * Warehouse constructor.
   *
   * @param string $siteKey
   * @param string $description
   * @param string $descriptionRu
   * @param string $phone
   * @param string $typeOfWarehouse
   * @param string $ref
   * @param int $number
   * @param string $cityRef
   * @param string $cityDescription
   * @param string $cityDescriptionRu
   * @param string $longitude
   * @param string $latitude
   * @param int $postFinance
   * @param int $bicycleParking
   * @param int $posTerminal
   * @param int $internationalShipping
   * @param int $totalMaxWeightAllowed
   * @param int $placeMaxWeightAllowed
   * @param array $reception
   * @param array $delivery
   * @param array $schedule
   */
  public function __construct(string $siteKey,
                              string $description,
                              string $descriptionRu,
                              string $phone,
                              string $typeOfWarehouse,
                              string $ref,
                              int $number,
                              string $cityRef,
                              string $cityDescription,
                              string $cityDescriptionRu,
                              string $longitude,
                              string $latitude,
                              int $postFinance = 0,
                              int $bicycleParking = 0,
                              int $posTerminal = 0,
                              int $internationalShipping = 0,
                              int $totalMaxWeightAllowed = 0,
                              int $placeMaxWeightAllowed = 0,
                              array $reception = [],
                              array $delivery = [],
                              array $schedule = []) {
    $this->siteKey = $siteKey;
    $this->description = $description;
    $this->descriptionRu = $descriptionRu;
    $this->phone = $phone;
    $this->typeOfWarehouse = $typeOfWarehouse;
    $this->ref = $ref;
    $this->number = $number;
    $this->cityRef = $cityRef;
    $this->cityDescription = $cityDescription;
    $this->cityDescriptionRu = $cityDescriptionRu;
    $this->longitude = $longitude;
    $this->latitude = $latitude;
    $this->postFinance = $postFinance;
    $this->bicycleParking = $bicycleParking;
    $this->posTerminal = $posTerminal;
    $this->internationalShipping = $internationalShipping;
    $this->totalMaxWeightAllowed = $totalMaxWeightAllowed;
    $this->placeMaxWeightAllowed = $placeMaxWeightAllowed;
    $this->reception = $reception;
    $this->delivery = $delivery;
    $this->schedule = $schedule;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      "SiteKey" => $this->siteKey,
      "Description" => $this->description,
      "DescriptionRu" => $this->descriptionRu,
      "Phone" => $this->phone,
      "TypeOfWarehouse" => $this->typeOfWarehouse,
      "Ref" => $this->ref,
      "Number" => $this->number,
      "CityRef" => $this->cityRef,
      "CityDescription" => $this->cityDescription,
      "CityDescriptionRu" => $this->cityDescriptionRu,
      "Longitude" => $this->longitude,
      "Latitude" => $this->latitude,
      "PostFinance" => $this->postFinance,
      "BicycleParking" => $this->bicycleParking,
      "POSTerminal" => $this->posTerminal,
      "InternationalShipping" => $this->internationalShipping,
      "TotalMaxWeightAllowed" => $this->totalMaxWeightAllowed,
      "PlaceMaxWeightAllowed" => $this->placeMaxWeightAllowed,
      "reception" => $this->reception,
      "delivery" => $this->delivery,
      "schedule" => $this->schedule,
    ];
  }

  /**
   * @param array $attributes
   * @return BaseEntity
   */
  public static function createFromArray(array $attributes): BaseEntity {
    return new self(
      (string)Arr::get($attributes, 'SiteKey', ''),
      (string)Arr::get($attributes, 'Description', ''),
      (string)Arr::get($attributes, 'DescriptionRu', ''),
      (string)Arr::get($attributes, 'Phone', ''),
      (string)Arr::get($attributes, 'TypeOfWarehouse', ''),
      (string)Arr::get($attributes, 'Ref', ''),
      (int)Arr::get($attributes, 'Number', 0),
      (string)Arr::get($attributes, 'CityRef', ''),
      (string)Arr::get($attributes, 'CityDescription', ''),
      (string)Arr::get($attributes, 'CityDescriptionRu', ''),
      (string)Arr::get($attributes, 'Longitude', ''),
      (string)Arr::get($attributes, 'Latitude', ''),
      (int)Arr::get($attributes, 'PostFinance', 0),
      (int)Arr::get($attributes, 'BicycleParking', 0),
      (int)Arr::get($attributes, 'POSTerminal', 0),
      (int)Arr::get($attributes, 'InternationalShipping', 0),
      (int)Arr::get($attributes, 'TotalMaxWeightAllowed', 0),
      (int)Arr::get($attributes, 'PlaceMaxWeightAllowed', 0),
      Arr::wrap(Arr::get($attributes, 'reception', [])),
      Arr::wrap(Arr::get($attributes, 'delivery', [])),
      Arr::wrap(Arr::get($attributes, 'schedule', []))
    );
  }
}