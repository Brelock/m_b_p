<?php

namespace App\NovaPoshta\Entity;

use Illuminate\Support\Arr;

class CounterpartyContactPerson extends BaseEntity {
  /**
   * Контактное лицо.
   *
   * @var string
   */
  protected $description;

  /**
   * Идентификатор контактного лица.
   *
   * @var string
   */
  protected $ref;

  /**
   * Телефон.
   *
   * @var string
   */
  protected $phones;

  /**
   * Электронная почта.
   *
   * @var string
   */
  protected $email;

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
   * CounterpartyContactPerson constructor.
   *
   * @param string $description
   * @param string $ref
   * @param string $phones
   * @param string $email
   * @param string $firstName
   * @param string $lastName
   * @param string $middleName
   */
  public function __construct(string $description,
                              string $ref,
                              string $phones,
                              string $email,
                              string $firstName,
                              string $lastName,
                              string $middleName) {
    $this->description = $description;
    $this->ref = $ref;
    $this->phones = $phones;
    $this->email = $email;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->middleName = $middleName;
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
  public function getPhones(): string {
    return $this->phones;
  }

  /**
   * @return string
   */
  public function getEmail(): string {
    return $this->email;
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
   * @return array
   */
  public function toArray() : array {
    return [
      "Description" => $this->description,
      "Ref" => $this->ref,
      "Phones" => $this->phones,
      "Email" => $this->email,
      "LastName" => $this->lastName,
      "FirstName" => $this->firstName,
      "MiddleName" => $this->middleName,
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
      (string)Arr::get($attributes, 'Phones', ''),
      (string)Arr::get($attributes, 'Email', ''),
      (string)Arr::get($attributes, 'LastName', ''),
      (string)Arr::get($attributes, 'FirstName', ''),
      (string)Arr::get($attributes, 'MiddleName', '')
    );
  }
}