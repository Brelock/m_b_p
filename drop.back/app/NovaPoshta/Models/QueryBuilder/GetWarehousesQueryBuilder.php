<?php

namespace App\NovaPoshta\Models\QueryBuilder;

use App\Helpers\ArrayHelper;
use App\NovaPoshta\Enums\Languages;

/**
 * Параметры фильтра для метода "getWarehouses" в АПИ Новой Почты.
 */
class GetWarehousesQueryBuilder implements IQueryBuilder {
  /**
   * Дополнительный фильтр по имени города.
   *
   * @var string
   */
  protected $cityName;

  /**
   * Дополнительный фильтр по идентификатору города.
   *
   * @var string
   */
  protected $cityRef;

  /**
   * Страница, максимум 500 записей на странице. Работает в связке с параметром Limit.
   *
   * @var int
   */
  protected $page = 1;

  /**
   * Количество записей на странице. Работает в связке с параметром Page.
   *
   * @var int
   */
  protected $limit = 500;

  /**
   * Вывод описания на Украинском или русском языках - ru.
   * По умолчанию всегда выводиться на Украинском языке.
   *
   * @var string
   */
  protected $language = Languages::RU;

  /**
   * GetWarehousesQueryBuilder constructor.
   *
   * @param int $page
   * @param int $limit
   * @param string $cityName
   * @param string $cityRef
   * @param string $language
   */
  public function __construct(int $page = 1, int $limit = 500, string $cityName = '', string $cityRef = '', string $language = '') {
    $this->cityName = $cityName;
    $this->cityRef = $cityRef;
    $this->page = $page;
    $this->limit = $limit;
    $this->language = $language;
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
      'CityName' => $this->cityName,
      'CityRef'  => $this->cityRef,
      'Page'     => $this->page,
      'Limit'    => $this->limit,
      'Language' => $this->language,
    ]);
  }
}