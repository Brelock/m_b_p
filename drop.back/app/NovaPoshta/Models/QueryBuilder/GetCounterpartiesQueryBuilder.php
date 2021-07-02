<?php

namespace App\NovaPoshta\Models\QueryBuilder;

class GetCounterpartiesQueryBuilder implements IQueryBuilder {
  /**
   * @var string
   */
  protected $property = 'Sender';

  /**
   * @var string
   */
  protected $page = '1';

  /**
   * GetCounterpartiesQueryBuilder constructor.
   *
   * @param string $property
   * @param string $page
   */
  public function __construct(string $property = 'Sender', string $page = '1') {
    $this->property = $property;
    $this->page = $page;
  }

  /**
   * @return string
   */
  public function getProperty(): string {
    return $this->property;
  }

  /**
   * @return string
   */
  public function getPage(): string {
    return $this->page;
  }

  /**
   * @return bool
   */
  public function hasAllForSendRequest(): bool {
    return !empty($this->property);
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return [
      "CounterpartyProperty" => $this->property,
      "Page" => $this->page,
    ];
  }
}