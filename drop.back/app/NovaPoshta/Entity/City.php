<?php

namespace App\NovaPoshta\Entity;

use Illuminate\Support\Arr;

class City extends BaseEntity {
  /**
   * Город на Украинском языке.
   *
   * @var string
   */
  protected $description;

  /**
   * Город на русском языке.
   *
   * @var string
   */
  protected $descriptionRu;

  /**
   * Идентификатор города.
   *
   * @var string
   */
  protected $ref;

  /**
   * Наличие доставки отправления в понедельник.
   *
   * @var int
   */
  protected $delivery1;

  /**
   * Наличие доставки отправления во вторник.
   *
   * @var int
   */
  protected $delivery2;

  /**
   * Наличие доставки отправления в среду.
   *
   * @var int
   */
  protected $delivery3;

  /**
   * Наличие доставки отправления в четверг.
   *
   * @var int
   */
  protected $delivery4;

  /**
   * Наличие доставки отправления в пятницу.
   *
   * @var int
   */
  protected $delivery5;

  /**
   * Наличие доставки отправления в субботу.
   *
   * @var int
   */
  protected $delivery6;

  /**
   * Наличие доставки отправления в воскресенье.
   *
   * @var int
   */
  protected $delivery7;

  /**
   * Область.
   *
   * @var string
   */
  protected $area;

  /**
   * Идентификатор (REF) типа населенного пункта.
   *
   * @var string
   */
  protected $settlementType;

  /**
   * Обозначение наличия отделений у города.
   *
   * @var int
   */
  protected $isBranch;

  /**
   * @var string|null
   */
  protected $preventEntryNewStreetsUser;

  /**
   * Конгломерат.
   *
   * @var string|null
   */
  protected $conglomerates;

  /**
   * Код населенного пункта.
   *
   * @var string
   */
  protected $cityID;

  /**
   * Описание типа населенного пункта на Русском языке.
   *
   * @var string
   */
  protected $settlementTypeDescriptionRu;

  /**
   * Описание типа населенного пункта на Украинском языке.
   *
   * @var string
   */
  protected $settlementTypeDescription;

  /**
   * City constructor.
   *
   * @param string $description
   * @param string $descriptionRu
   * @param string $ref
   * @param string $area
   * @param string $settlementType
   * @param string $cityID
   * @param string $settlementTypeDescriptionRu
   * @param string $settlementTypeDescription
   * @param int $delivery1
   * @param int $delivery2
   * @param int $delivery3
   * @param int $delivery4
   * @param int $delivery5
   * @param int $delivery6
   * @param int $delivery7
   * @param int $isBranch
   * @param null|string $preventEntryNewStreetsUser
   * @param null|string $conglomerates
   */
  public function __construct(string $description,
                              string $descriptionRu,
                              string $ref,
                              string $area,
                              string $settlementType,
                              string $cityID,
                              string $settlementTypeDescriptionRu,
                              string $settlementTypeDescription,
                              int $delivery1 = 0,
                              int $delivery2 = 0,
                              int $delivery3 = 0,
                              int $delivery4 = 0,
                              int $delivery5 = 0,
                              int $delivery6 = 0,
                              int $delivery7 = 0,
                              int $isBranch = 0,
                              ?string $preventEntryNewStreetsUser = null,
                              ?string $conglomerates = null) {
    $this->description = $description;
    $this->descriptionRu = $descriptionRu;
    $this->ref = $ref;
    $this->area = $area;
    $this->settlementType = $settlementType;
    $this->cityID = $cityID;
    $this->settlementTypeDescriptionRu = $settlementTypeDescriptionRu;
    $this->settlementTypeDescription = $settlementTypeDescription;
    $this->delivery1 = $delivery1;
    $this->delivery2 = $delivery2;
    $this->delivery3 = $delivery3;
    $this->delivery4 = $delivery4;
    $this->delivery5 = $delivery5;
    $this->delivery6 = $delivery6;
    $this->delivery7 = $delivery7;
    $this->isBranch = $isBranch;
    $this->preventEntryNewStreetsUser = $preventEntryNewStreetsUser;
    $this->conglomerates = $conglomerates;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return [
      "Description"                 => $this->description,
      "DescriptionRu"               => $this->descriptionRu,
      "Ref"                         => $this->ref,
      "Delivery1"                   => $this->delivery1,
      "Delivery2"                   => $this->delivery2,
      "Delivery3"                   => $this->delivery3,
      "Delivery4"                   => $this->delivery4,
      "Delivery5"                   => $this->delivery5,
      "Delivery6"                   => $this->delivery6,
      "Delivery7"                   => $this->delivery7,
      "Area"                        => $this->area,
      "SettlementType"              => $this->settlementType,
      "IsBranch"                    => $this->isBranch,
      "PreventEntryNewStreetsUser"  => $this->preventEntryNewStreetsUser,
      "Conglomerates"               => $this->conglomerates,
      "CityID"                      => $this->cityID,
      "SettlementTypeDescriptionRu" => $this->settlementTypeDescriptionRu,
      "SettlementTypeDescription"   => $this->settlementTypeDescription,
    ];
  }

  /**
   * @param array $attributes
   * @return BaseEntity
   */
  public static function createFromArray(array $attributes): BaseEntity {
    return new self(
      (string)Arr::get($attributes, 'Description', ''),
      (string)Arr::get($attributes, 'DescriptionRu', ''),
      (string)Arr::get($attributes, 'Ref', ''),
      (string)Arr::get($attributes, 'Area', ''),
      (string)Arr::get($attributes, 'SettlementType', ''),
      (string)Arr::get($attributes, 'CityID', ''),
      (string)Arr::get($attributes, 'SettlementTypeDescriptionRu', ''),
      (string)Arr::get($attributes, 'SettlementTypeDescription', ''),
      (int)Arr::get($attributes, 'Delivery1'),
      (int)Arr::get($attributes, 'Delivery2'),
      (int)Arr::get($attributes, 'Delivery3'),
      (int)Arr::get($attributes, 'Delivery4'),
      (int)Arr::get($attributes, 'Delivery5'),
      (int)Arr::get($attributes, 'Delivery6'),
      (int)Arr::get($attributes, 'Delivery7'),
      (int)Arr::get($attributes, 'IsBranch', 0),
      ((int)Arr::get($attributes, 'PreventEntryNewStreetsUser') ?: null),
      ((int)Arr::get($attributes, 'Conglomerates') ?: null)
    );
  }
}