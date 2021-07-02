<?php

namespace App\NovaPoshta\Models\QueryBuilder\InternetDocument;

use App\NovaPoshta\Models\QueryBuilder\IQueryBuilder;

class Recipient implements IQueryBuilder {
  /**
   * Идентификатор города получателя.
   *
   * @var string
   */
  protected $cityRef;

  /**
   * Идентификатор получателя.
   *
   * @var string
   */
  protected $ref;

  /**
   * Идентификатор адреса получателя.
   *
   * @var string
   */
  protected $warehouseRef;

  /**
   * Идентификатор контактного лица получателя.
   *
   * @var string
   */
  protected $contactRef;

  /**
   * Телефон получателя в формате: +380660000000, 80660000000, 0660000000.
   *
   * @var string
   */
  protected $phone;

  /**
   * Recipient constructor.
   *
   * @param string $cityRef
   * @param string $ref
   * @param string $warehouseRef
   * @param string $contactRef
   * @param string $phone
   */
  public function __construct(string $cityRef, string $ref, string $warehouseRef, string $contactRef, string $phone) {
    $this->cityRef = $cityRef;
    $this->ref = $ref;
    $this->warehouseRef = $warehouseRef;
    $this->contactRef = $contactRef;
    $this->phone = $phone;
  }

  /**
   * @return string
   */
  public function getCityRef(): string {
    return $this->cityRef;
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
  public function getWarehouseRef(): string {
    return $this->warehouseRef;
  }

  /**
   * @return string
   */
  public function getContactRef(): string {
    return $this->contactRef;
  }

  /**
   * @return string
   */
  public function getPhone(): string {
    return $this->phone;
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
      "CityRecipient"    => $this->cityRef,
      "Recipient"        => $this->ref,
      "RecipientAddress" => $this->warehouseRef,
      "ContactRecipient" => $this->contactRef,
      "RecipientsPhone"  => $this->phone,
    ];
  }
}