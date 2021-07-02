<?php

namespace App\NovaPoshta\Models\QueryBuilder;

use App\NovaPoshta\Models\QueryBuilder\InternetDocument\BaseOptions;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\RecipientWarehouse;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Sender;

class CreateInternetDocumentToWarehouseQueryBuilder extends BaseCreateInternetDocumentQueryBuilder {
  /**
   * Использование нового адресного справочника. 1 - ДА, 0 - НЕТ.
   *
   * @var int
   */
  protected $newAddress = 1;

  /**
   * Объект получателя.
   *
   * @var string
   */
  protected $recipient;

  /**
   * CreateInternetDocumentToWarehouseQueryBuilder constructor.
   *
   * @param Sender $sender
   * @param RecipientWarehouse $recipient
   * @param BaseOptions $options
   * @param int $newAddress
   */
  public function __construct(Sender $sender,
                              RecipientWarehouse $recipient,
                              BaseOptions $options,
                              int $newAddress = 1) {

    parent::__construct($sender, $options);

    $this->recipient = $recipient;
    $this->newAddress = $newAddress;
  }

  /**
   * @return array
   */
  public function queryParams(): array {
    return array_merge(
      parent::queryParams(),

      $this->recipient->queryParams(),

      [
        "NewAddress" => $this->newAddress,
      ]
    );
  }
}