<?php

namespace App\NovaPoshta\Models\QueryBuilder;

use App\NovaPoshta\Models\QueryBuilder\InternetDocument\BaseOptions;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Recipient;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Sender;

class CreateInternetDocumentQueryBuilder extends BaseCreateInternetDocumentQueryBuilder {
  /**
   * Объект получателя.
   *
   * @var Recipient
   */
  protected $recipient;

  /**
   * CreateInternetDocumentQueryBuilder constructor.
   *
   * @param Sender $sender
   * @param Recipient $recipient
   * @param BaseOptions $options
   */
  public function __construct(Sender $sender,
                              Recipient $recipient,
                              BaseOptions $options) {
    parent::__construct($sender, $options);

    $this->recipient = $recipient;
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return array_merge(parent::queryParams(), $this->recipient->queryParams());
  }
}