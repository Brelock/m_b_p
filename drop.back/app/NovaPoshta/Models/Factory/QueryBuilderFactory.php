<?php

namespace App\NovaPoshta\Models\Factory;

use App\NovaPoshta\Entity\Counterparty;
use App\NovaPoshta\Models\QueryBuilder\GetCounterpartyContactPersonsQueryBuilder;

class QueryBuilderFactory {
  /**
   * @param Counterparty $counterparty
   * @return GetCounterpartyContactPersonsQueryBuilder
   */
  public static function createCounterpartyContactPersonsQueryBuilder(Counterparty $counterparty) : GetCounterpartyContactPersonsQueryBuilder {
    return new GetCounterpartyContactPersonsQueryBuilder($counterparty->getRef());
  }
}