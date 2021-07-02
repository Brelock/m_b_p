<?php

namespace App\NovaPoshta\Models\QueryBuilder;

class UpdateCounterpartyQueryBuilder extends CreateCounterpartyQueryBuilder {
  /**
   * @var string
   */
  protected $ref;

  /**
   * @var string
   */
  protected $cityRef;

  /**
   * UpdateCounterpartyQueryBuilder constructor.
   *
   * @param string $ref
   * @param string $cityRef
   * @param string $firstName
   * @param string $middleName
   * @param string $lastName
   * @param string $phone
   * @param null|string $email
   * @param string $counterpartyType
   * @param string $counterpartyProperty
   */
  public function __construct(string $ref,
                              string $cityRef,
                              string $firstName,
                              string $middleName,
                              string $lastName,
                              string $phone,
                              ?string $email,
                              string $counterpartyType,
                              string $counterpartyProperty) {
    parent::__construct(
      $firstName,
      $middleName,
      $lastName,
      $phone,
      $email,
      $counterpartyType,
      $counterpartyProperty
    );

    $this->ref = $ref;
    $this->cityRef = $cityRef;
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
  public function getCityRef(): string {
    return $this->cityRef;
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return array_merge([
      'Ref' => $this->ref,
      'CityRef' => $this->cityRef,
    ], parent::queryParams());
  }
}