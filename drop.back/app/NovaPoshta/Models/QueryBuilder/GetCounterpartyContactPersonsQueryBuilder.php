<?php

namespace App\NovaPoshta\Models\QueryBuilder;

class GetCounterpartyContactPersonsQueryBuilder implements IQueryBuilder {
  /**
   * @var string
   */
  protected $ref;

  /**
   * @var int
   */
  protected $page;

  /**
   * GetCounterpartyContactPersons constructor.
   *
   * @param string $ref
   * @param int $page
   */
  public function __construct(string $ref, int $page = 1) {
    $this->ref = $ref;
    $this->page = $page;
  }

  /**
   * @return bool
   */
  public function hasAllForSendRequest(): bool {
    return !empty($this->ref);
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return [
      'Ref' => $this->ref,
      'Page' => $this->page,
    ];
  }
}