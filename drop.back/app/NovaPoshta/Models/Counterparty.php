<?php

namespace App\NovaPoshta\Models;

use App\NovaPoshta\Collection\CounterpartyCollection;
use App\NovaPoshta\Collection\CounterpartyContactPersonCollection;
use App\NovaPoshta\Exceptions\NovaPoshtaException;
use App\NovaPoshta\Models\QueryBuilder\CreateCounterpartyQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\GetCounterpartiesQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\GetCounterpartyContactPersonsQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\UpdateCounterpartyQueryBuilder;
use Illuminate\Support\Arr;
use App\NovaPoshta\Entity\Counterparty as CounterpartyEntity;

class Counterparty extends BaseModel {
  /**
   * Загрузить список Контрагентов отправителей/получателей/третье лицо.
   * Метод «getCounterparties», работает в модели «Counterparty», этот метод загружает список контрагентов отправителей, получателей или третьих лиц.
   *
   * @param GetCounterpartiesQueryBuilder $queryBuilder
   * @return CounterpartyCollection
   *
   * @throws NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function fetch(GetCounterpartiesQueryBuilder $queryBuilder): CounterpartyCollection {
    $response = $this->callMethodAPI('getCounterparties', $queryBuilder->queryParams());

    $collection = new CounterpartyCollection(Arr::wrap(Arr::get($response->getBody(), 'data', [])));
    return $collection->init();
  }

  /**
   * Загрузить список контактных лиц Контрагента.
   * Метод «getCounterpartyContactPerson», работает в модели «Counterparty», этот метод загружает список контактных лиц контрагентов.
   *
   * @param GetCounterpartyContactPersonsQueryBuilder $queryBuilder
   *
   * @return CounterpartyContactPersonCollection
   *
   * @throws NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function fetchContactPersons(GetCounterpartyContactPersonsQueryBuilder $queryBuilder) : CounterpartyContactPersonCollection {
    $response = $this->callMethodAPI('getCounterpartyContactPersons', $queryBuilder->queryParams());

    $collection = new CounterpartyContactPersonCollection(Arr::wrap(Arr::get($response->getBody(), 'data', [])));
    return $collection->init();
  }

  /**
   * Создать Контрагента.
   * Метод «save», работает в модели «Counterparty», этот метод используется при создании Контрагента получателя.
   *
   * @param CreateCounterpartyQueryBuilder $queryBuilder
   *
   * @return CounterpartyEntity
   *
   * @throws NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function create(CreateCounterpartyQueryBuilder $queryBuilder) : CounterpartyEntity {
    $response = $this->callMethodAPI('save', $queryBuilder->queryParams());

    /* @var CounterpartyEntity $entity */
    $entity = CounterpartyEntity::createFromArray(Arr::get($response->getBody(), 'data.0', []));
    return $entity;
  }

  /**
   * Обновить данные Контрагента.
   * Метод «update», работает в модели «Counterparty», этот метод необходим для обновления / изменения данных контрагента отправителя / получателя.
   *
   * @param UpdateCounterpartyQueryBuilder $queryBuilder
   *
   * @return CounterpartyEntity
   *
   * @throws NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function update(UpdateCounterpartyQueryBuilder $queryBuilder) : CounterpartyEntity {
    $response = $this->callMethodAPI('update', $queryBuilder->queryParams());

    /* @var CounterpartyEntity $entity */
    $entity = CounterpartyEntity::createFromArray(Arr::get($response->getBody(), 'data.0', []));
    return $entity;
  }
}