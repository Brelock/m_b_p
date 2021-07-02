<?php

namespace App\NovaPoshta\Models\QueryBuilder;

use App\Helpers\ArrayHelper;

/**
 * Параметры фильтра для метода "getCities" в АПИ Новой Почты.
 */
class GetCitiesQueryBuilder implements IQueryBuilder {
  /**
   * Идентификатор города.
   *
   * @var string
   */
  protected $ref;

  /**
   * Номер страницы для отображения.
   *
   * @var int
   */
  protected $page;

  /**
   * Поиск по названию города.
   *
   * @var string
   */
  protected $q;

  /**
   * GetCities constructor.
   *
   * @param int $page
   * @param string $ref
   * @param string $q
   */
  public function __construct(int $page = 1, string $ref = '', string $q = '') {
    $this->ref = $ref;
    $this->page = $page;
    $this->q = $q;
  }

  /**
   * @return GetCitiesQueryBuilder
   */
  public function prevPage() : self {
    --$this->page;
    return $this;
  }

  /**
   * @return GetCitiesQueryBuilder
   */
  public function nextPage() : self {
    ++$this->page;
    return $this;
  }

  /**
   * @return string
   */
  public function getRef(): string {
    return $this->ref;
  }

  /**
   * @param string $ref
   * @return self
   */
  public function setRef(string $ref): self {
    $this->ref = $ref;
    return $this;
  }

  /**
   * @return int
   */
  public function getPage(): int {
    return $this->page;
  }

  /**
   * @param int $page
   * @return self
   */
  public function setPage(int $page): self {
    $this->page = $page;
    return $this;
  }

  /**
   * @return string
   */
  public function getQ(): string {
    return $this->q;
  }

  /**
   * @param string $q
   * @return self
   */
  public function setQ(string $q): self {
    $this->q = $q;
    return $this;
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
    return ArrayHelper::exceptEmptyValues([
      'Ref' => $this->ref,
      'Page' => $this->page,
      'FindByString' => $this->q,
    ]);
  }
}