<?php

namespace App\Services;

use App\Models\Settings;
use App\NovaPoshta\Entity\Counterparty;
use App\NovaPoshta\Entity\CounterpartyContactPerson;

class SettingsService {
  /**
   * @var Settings
   */
  private $settings;

  /**
   * SettingsService constructor.
   *
   * @param Settings $settings
   */
  public function __construct(Settings $settings) {
    $this->settings = $settings;
  }

  /**
   * @return Settings
   */
  public function getSettings(): Settings {
    return $this->settings;
  }

  /**
   * @param Counterparty $counterparty
   * @return SettingsService
   */
  public function copySender(Counterparty $counterparty) : self {
    $this->settings->novaposhta_sender_ref = $counterparty->getRef();
    return $this;
  }

  /**
   * @param CounterpartyContactPerson $contactPerson
   * @return SettingsService
   */
  public function copySenderContact(CounterpartyContactPerson $contactPerson) : self {
    $this->settings->novaposhta_sender_contact_ref = $contactPerson->getRef();
    $this->settings->novaposhta_sender_phone_number = $contactPerson->getPhones();
    return $this;
  }

  /**
   * @param int|null $id
   * @return SettingsService
   */
  public function attachSenderCity(?int $id) : self {
    $this->settings->novaposhta_sender_city_id = $id;
    return $this;
  }

  /**
   * @param int|null $id
   * @return SettingsService
   */
  public function attachSenderWarehouse(?int $id) : self {
    $this->settings->novaposhta_sender_warehouse_id = $id;
    return $this;
  }

  /**
   * @return SettingsService
   */
  public function commitChanges() : self {
    $this->settings->save();

    return $this;
  }
}