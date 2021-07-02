<?php

namespace App\NovaPoshta\Models\QueryBuilder;

use App\Helpers\ArrayHelper;
use Illuminate\Support\Arr;

class CreateCounterpartyQueryBuilder implements IQueryBuilder {
  /**
   * @var string
   */
  protected $firstName;

  /**
   * @var string
   */
  protected $middleName;

  /**
   * @var string
   */
  protected $lastName;

  /**
   * @var string
   */
  protected $phone;

  /**
   * @var string|null
   */
  protected $email;

  /**
   * @var string
   */
  protected $counterpartyType;

  /**
   * @var string
   */
  protected $counterpartyProperty;

  /**
   * CreateCounterpartyQueryBuilder constructor.
   *
   * @param string $firstName
   * @param string $middleName
   * @param string $lastName
   * @param string $phone
   * @param string|null $email
   * @param string $counterpartyType
   * @param string $counterpartyProperty
   */
  public function __construct(string $firstName,
                              string $middleName,
                              string $lastName,
                              string $phone,
                              ?string $email,
                              string $counterpartyType,
                              string $counterpartyProperty) {
    $this->firstName = $firstName;
    $this->middleName = $middleName;
    $this->lastName = $lastName;
    $this->phone = $phone;
    $this->email = $email;
    $this->counterpartyType = $counterpartyType;
    $this->counterpartyProperty = $counterpartyProperty;
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
  public function getMiddleName(): string {
    return $this->middleName;
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
  public function getPhone(): string {
    return $this->phone;
  }

  /**
   * @return string|null
   */
  public function getEmail(): ?string {
    return $this->email;
  }

  /**
   * @return string
   */
  public function getCounterpartyType(): string {
    return $this->counterpartyType;
  }

  /**
   * @return string
   */
  public function getCounterpartyProperty(): string {
    return $this->counterpartyProperty;
  }

  /**
   * @return bool
   */
  public function hasAllForSendRequest(): bool {
    return ArrayHelper::hasAllInArray(Arr::except($this->queryParams(), ['Email']));
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return [
      "FirstName" => $this->firstName,
      "MiddleName" => $this->middleName,
      "LastName" => $this->lastName,
      "Phone" => $this->phone,
      "Email" => $this->email,
      "CounterpartyType" => $this->counterpartyType,
      "CounterpartyProperty" => $this->counterpartyProperty
    ];
  }
}