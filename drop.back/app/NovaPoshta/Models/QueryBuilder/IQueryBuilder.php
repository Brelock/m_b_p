<?php

namespace App\NovaPoshta\Models\QueryBuilder;

interface IQueryBuilder {
  /**
   * @return bool
   */
  public function hasAllForSendRequest() : bool;

  /**
   * @return array
   */
  public function queryParams() : array;
}