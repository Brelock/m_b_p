<?php

namespace App\NovaPoshta\Entity;

use Illuminate\Support\Arr;

class Counterparty extends BaseEntity {
  /**
   * Описание на украинском языке.
   *
   * @var string
   */
  protected $description;

  /**
   * Идентификатор.
   *
   * @var string
   */
  protected $ref;

  /**
   * Город контрагента.
   *
   * @var string
   */
  protected $city;

  /**
   * @var string
   */
  protected $counterparty;

  /**
   * Имя.
   *
   * @var string
   */
  protected $firstName;

  /**
   * Фамилия.
   *
   * @var string
   */
  protected $lastName;

  /**
   * Отчество.
   *
   * @var string
   */
  protected $middleName;

  /**
   * Идинтификатор формы собственности.
   *
   * @var string
   */
  protected $ownershipFormRef;

  /**
   * Описание формы собствености.
   *
   * @var string
   */
  protected $ownershipFormDescription;

  /**
   * Код ОКПО.
   *
   * @var string
   */
  protected $edrpou;

  /**
   * Тип контрагента.
   *
   * @var string
   */
  protected $counterpartyType;

  /**
   * @var CounterpartyContactPerson|null
   */
  protected $contactPerson;

  /**
   * Counterparty constructor.
   *
   * @param string $description
   * @param string $ref
   * @param string $city
   * @param string $counterparty
   * @param string $firstName
   * @param string $lastName
   * @param string $middleName
   * @param string $ownershipFormRef
   * @param string $ownershipFormDescription
   * @param string $edrpou
   * @param string $counterpartyType
   * @param CounterpartyContactPerson $contactPerson
   */
  public function __construct(string $description,
                              string $ref,
                              string $city,
                              string $counterparty,
                              string $firstName,
                              string $lastName,
                              string $middleName,
                              string $ownershipFormRef,
                              string $ownershipFormDescription,
                              string $edrpou,
                              string $counterpartyType,
                              CounterpartyContactPerson $contactPerson = null) {
    $this->description = $description;
    $this->ref = $ref;
    $this->city = $city;
    $this->counterparty = $counterparty;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->middleName = $middleName;
    $this->ownershipFormRef = $ownershipFormRef;
    $this->ownershipFormDescription = $ownershipFormDescription;
    $this->edrpou = $edrpou;
    $this->counterpartyType = $counterpartyType;
    $this->contactPerson = $contactPerson;
  }

  /**
   * @return string
   */
  public function getDescription(): string {
    return $this->description;
  }

  /**
   * @return string
   */
  public function getRef(): string {
    return $this->ref;
  }

  /**
   * @return string
   */
  public function getCity(): string {
    return $this->city;
  }

  /**
   * @return string
   */
  public function getCounterparty(): string {
    return $this->counterparty;
  }

  /**
   * @return string
   */
  public function getFirstName(): string {
    return $this->firstName;
  }

  /**
   * @return string
   */
  public function getLastName(): string {
    return $this->lastName;
  }

  /**
   * @return string
   */
  public function getMiddleName(): string {
    return $this->middleName;
  }

  /**
   * @return string
   */
  public function getOwnershipFormRef(): string {
    return $this->ownershipFormRef;
  }

  /**
   * @return string
   */
  public function getOwnershipFormDescription(): string {
    return $this->ownershipFormDescription;
  }

  /**
   * @return string
   */
  public function getEdrpou(): string {
    return $this->edrpou;
  }

  /**
   * @return string
   */
  public function getCounterpartyType(): string {
    return $this->counterpartyType;
  }

  /**
   * @return CounterpartyContactPerson|null
   */
  public function getContactPerson(): ?CounterpartyContactPerson {
    return $this->contactPerson;
  }

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      "Description" => $this->description,
      "Ref" => $this->ref,
      "City" => $this->city,
      "Counterparty" => $this->counterparty,
      "FirstName" => $this->firstName,
      "LastName" => $this->lastName,
      "MiddleName" => $this->middleName,
      "OwnershipFormRef" => $this->ownershipFormRef,
      "OwnershipFormDescription" => $this->ownershipFormDescription,
      "EDRPOU" => $this->edrpou,
      "CounterpartyType" => $this->counterpartyType,
      "ContactPerson" => $this->contactPerson ? $this->contactPerson->toArray() : null,
    ];
  }

  /**
   * @param array $attributes
   * @return BaseEntity
   */
  public static function createFromArray(array $attributes): BaseEntity {
    return new self(
      (string)Arr::get($attributes, 'Description', ''),
      (string)Arr::get($attributes, 'Ref', ''),
      (string)Arr::get($attributes, 'City', ''),
      (string)Arr::get($attributes, 'Counterparty', ''),
      (string)Arr::get($attributes, 'FirstName', ''),
      (string)Arr::get($attributes, 'LastName', ''),
      (string)Arr::get($attributes, 'MiddleName', ''),
      (string)Arr::get($attributes, 'OwnershipFormRef', ''),
      (string)Arr::get($attributes, 'OwnershipFormDescription', ''),
      (string)Arr::get($attributes, 'EDRPOU', ''),
      (string)Arr::get($attributes, 'CounterpartyType', ''),
      CounterpartyContactPerson::createFromArray(Arr::wrap(Arr::get($attributes, 'ContactPerson.data.0', [])))
    );
  }
}