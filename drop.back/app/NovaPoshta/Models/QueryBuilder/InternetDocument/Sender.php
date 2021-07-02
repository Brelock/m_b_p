<?php

namespace App\NovaPoshta\Models\QueryBuilder\InternetDocument;

use App\NovaPoshta\Models\QueryBuilder\IQueryBuilder;

class Sender implements IQueryBuilder {
  /**
   * Идентификатор города отправителя.
   *
   * @var string
   */
  protected $cityRef;

  /**
   * Идентификатор отправителя.
   *
   * @var string
   */
  protected $ref;

  /**
   * Идентификатор адреса отправителя.
   *
   * @var string
   */
  protected $warehouseRef;

  /**
   * Идентификатор контактного лица отправителя.
   *
   * @var string
   */
  protected $contactRef;

  /**
   * Телефон отправителя в формате: +380660000000, 380660000000, 0660000000.
   *
   * @var string
   */
  protected $phone;

  /**
   * Sender constructor.
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
      "CitySender"       => $this->cityRef,
      "Sender"           => $this->ref,
      "SenderAddress"    => $this->warehouseRef,
      "ContactSender"    => $this->contactRef,
      "SendersPhone"     => $this->phone,
    ];
  }
}