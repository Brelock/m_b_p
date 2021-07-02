<?php

namespace App\NovaPoshta\Models;

use App\NovaPoshta\Entity\CreatedInternetDocument as InternetDocumentEntity;
use App\NovaPoshta\Entity\CreatedInternetDocument;
use App\NovaPoshta\Models\QueryBuilder\BaseCreateInternetDocumentQueryBuilder;
use Illuminate\Support\Arr;

class InternetDocument extends BaseModel {
  /**
   * Cоздание/формирование экспресс-накладной (интернет-документа).
   *
   * @param BaseCreateInternetDocumentQueryBuilder $queryBuilder
   *
   * @return InternetDocumentEntity
   *
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function save(BaseCreateInternetDocumentQueryBuilder $queryBuilder) : InternetDocumentEntity {
    $response = $this->callMethodAPI('save', $queryBuilder->queryParams());

    /* @var CreatedInternetDocument $entity */
    $entity = CreatedInternetDocument::createFromArray(Arr::get($response->getBody(), 'data.0', []));
    return $entity;
  }
}