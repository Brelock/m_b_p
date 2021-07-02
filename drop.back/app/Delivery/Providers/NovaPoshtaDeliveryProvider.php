<?php

namespace App\Delivery\Providers;

use App\Delivery\DeliveryProvider;
use App\Delivery\Invoice;
use App\Delivery\Models\NovaPoshtaInvoice;
use App\DTO\OrderDto;
use App\Models\NovaPoshtaCity;
use App\Models\NovaPoshtaWarehouse;
use App\Models\Order;
use App\Models\Settings;
use App\NovaPoshta\Entity\Counterparty as CounterpartyEntity;
use App\NovaPoshta\Entity\CreatedInternetDocument;
use App\NovaPoshta\Enums\CounterpartyProperties;
use App\NovaPoshta\Enums\CounterpartyTypes;
use App\NovaPoshta\Models\Counterparty as CounterpartyModel;
use App\NovaPoshta\Models\InternetDocument;
use App\NovaPoshta\Models\QueryBuilder\CreateCounterpartyQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\CreateInternetDocumentQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\BaseOptions;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Recipient;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Sender;

class NovaPoshtaDeliveryProvider implements DeliveryProvider {
  /**
   * @var InternetDocument
   */
  protected $internetDocument;

  /**
   * @var CounterpartyModel
   */
  protected $counterparty;

  /**
   * NovaPoshtaDeliveryProvider constructor.
   *
   * @param InternetDocument $internetDocument
   * @param CounterpartyModel $counterparty
   */
  public function __construct(InternetDocument $internetDocument, CounterpartyModel $counterparty) {
    $this->internetDocument = $internetDocument;
    $this->counterparty = $counterparty;
  }

  /**
   * @param OrderDto $dto
   * @param Order $order
   *
   * @return Invoice
   *
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function generateInvoice(OrderDto $dto, Order $order): Invoice {
    $recipient = $this->createRecipient($dto);

    $recipientCity = $this->fetchCity($dto->getNovaposhtaCityId());
    $recipientWarehouse = $this->fetchWarehouse($dto->getNovaposhtaWarehouseId());

    $internetDocument = $this->createInternetDocument(
      $order,
      $dto,
      Settings::getInstanceModel(),
      $recipient,
      $recipientCity,
      $recipientWarehouse
    );

    return new NovaPoshtaInvoice($internetDocument);
  }

  /**
   * @param Order $order
   * @param OrderDto $dto
   * @param Settings $settings
   * @param CounterpartyEntity $recipient
   * @param NovaPoshtaCity $recipientCity
   * @param NovaPoshtaWarehouse $recipientWarehouse
   *
   * @return CreatedInternetDocument
   *
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  protected function createInternetDocument(Order $order,
                                            OrderDto $dto,
                                            Settings $settings,
                                            CounterpartyEntity $recipient,
                                            NovaPoshtaCity $recipientCity,
                                            NovaPoshtaWarehouse $recipientWarehouse) : CreatedInternetDocument {
    return $this->internetDocument->save(
      new CreateInternetDocumentQueryBuilder(
        new Sender(
          $settings->novaPoshtaCity->ref,
          $settings->novaposhta_sender_ref,
          $settings->novaPoshtaWarehouse->ref,
          $settings->novaposhta_sender_contact_ref,
          $settings->novaposhta_sender_phone_number
        ),
        new Recipient(
          $recipientCity->ref,
          $recipient->getRef(),
          $recipientWarehouse->ref,
          $recipient->getContactPerson()->getRef(),
          $dto->getNovaposhtaPhoneNumber()
        ),
        new BaseOptions($order->total_amount)
      )
    );
  }

  /**
   * Create counterparty.
   *
   * @param OrderDto $dto
   * @return CounterpartyEntity
   * @throws \App\NovaPoshta\Exceptions\NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  protected function createRecipient(OrderDto $dto) : CounterpartyEntity {
    return $this->counterparty->create(
      new CreateCounterpartyQueryBuilder(
        $dto->getNovaposhtaFirstName(),
        $dto->getNovaposhtaMiddleName(),
        $dto->getNovaposhtaLastName(),
        $dto->getNovaposhtaPhoneNumber(),
        '',
        CounterpartyTypes::PRIVATE_PERSON,
        CounterpartyProperties::RECIPIENT
      )
    );
  }

  /**
   * @param  int $id
   * @return NovaPoshtaCity|null
   */
  protected function fetchCity(int $id) : ?NovaPoshtaCity {
    /* @var NovaPoshtaCity $city */
    $city = NovaPoshtaCity::query()->find($id);
    return $city;
  }

  /**
   * @param  int $id
   * @return NovaPoshtaWarehouse|null
   */
  protected function fetchWarehouse(int $id) : ?NovaPoshtaWarehouse {
    /* @var NovaPoshtaWarehouse $warehouse */
    $warehouse = NovaPoshtaWarehouse::query()->find($id);
    return $warehouse;
  }
}