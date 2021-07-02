<?php

namespace App\Services\Actions\NovaPoshta;

use App\Models\Settings;
use App\NovaPoshta\Models\Counterparty;
use App\NovaPoshta\Models\Factory\QueryBuilderFactory;
use App\NovaPoshta\Models\QueryBuilder\GetCounterpartiesQueryBuilder;
use App\Services\SettingsService;

class SettingsServiceAction {
  /**
   * @var Counterparty
   */
  protected $counterparty;

  /**
   * SettingsServiceAction constructor.
   *
   * @param Counterparty $counterparty
   */
  public function __construct(Counterparty $counterparty) {
    $this->counterparty = $counterparty;
  }

  /**
   * @param Settings $settings
   *
   * @return Settings
   *
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function updateSender(Settings $settings) : Settings {
    $service = new SettingsService($settings);

    $counterparty = $this->counterparty
      ->fetch(new GetCounterpartiesQueryBuilder())
      ->first();

    $contactPerson = $this->counterparty
      ->fetchContactPersons(QueryBuilderFactory::createCounterpartyContactPersonsQueryBuilder($counterparty))
      ->first();

    $service
      ->copySender($counterparty)
      ->copySenderContact($contactPerson);

    $service->commitChanges();

    return $service->getSettings();
  }

  /**
   * @param Settings $settings
   * @param int|null $cityId
   * @param int|null $warehouseId
   *
   * @return Settings
   */
  public function updateSenderLocation(Settings $settings, ?int $cityId, ?int $warehouseId) : Settings {
    $service = new SettingsService($settings);

    $service
      ->attachSenderCity($cityId)
      ->attachSenderWarehouse($warehouseId);

    $service->commitChanges();

    return $service->getSettings();
  }
}