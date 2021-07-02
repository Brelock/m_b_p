<?php

namespace App\NovaPoshta\Models;

use App\NovaPoshta\Collection\CityCollection;
use App\NovaPoshta\Collection\WarehouseCollection;
use App\NovaPoshta\Models\QueryBuilder\GetCitiesQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\GetWarehousesQueryBuilder;
use Illuminate\Support\Arr;

class Address extends BaseModel {
  /**
   * Получение справочника городов компании «Новая Почта» на украинском и русском языках.
   *
   *
   * @param GetCitiesQueryBuilder $queryBuilder
   *
   * @return CityCollection
   *
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function fetchCities(GetCitiesQueryBuilder $queryBuilder) : CityCollection {
    $response = $this->callMethodAPI('getCities', $queryBuilder->queryParams());

    $collection = new CityCollection(Arr::wrap(Arr::get($response->getBody(), 'data', [])));
    return $collection->init();
  }

  /**
   * Загружает справочник отделений «Новая Почта» в рамках населенных пунктов Украины.
   *
   *
   * @param GetWarehousesQueryBuilder $queryBuilder
   *
   * @return WarehouseCollection
   *
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function fetchWarehouses(GetWarehousesQueryBuilder $queryBuilder) : WarehouseCollection {
    $response = $this->callMethodAPI('getWarehouses', $queryBuilder->queryParams());

    $collection = new WarehouseCollection(Arr::wrap(Arr::get($response->getBody(), 'data', [])));
    return $collection->init();
  }
}