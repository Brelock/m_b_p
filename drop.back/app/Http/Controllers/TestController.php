<?php

namespace App\Http\Controllers;

use App\Console\Commands\ImportRozetkaXml;
use App\Enums\DirectoriesStorage;
use App\Helpers\FileHelper;
use App\Support\Guzzle\BaseHttpClient;
use App\NovaPoshta\Enums\CounterpartyProperties;
use App\NovaPoshta\Enums\CounterpartyTypes;
use App\NovaPoshta\Exceptions\NovaPoshtaException;
use App\NovaPoshta\Models\Address;
use App\NovaPoshta\Models\Counterparty;
use App\NovaPoshta\Models\Factory\QueryBuilderFactory;
use App\NovaPoshta\Models\InternetDocument;
use App\NovaPoshta\Models\QueryBuilder\CreateCounterpartyQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\CreateInternetDocumentQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\GetCitiesQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\GetCounterpartiesQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\GetCounterpartyContactPersonsQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\GetWarehousesQueryBuilder;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\BaseOptions;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Recipient;
use App\NovaPoshta\Models\QueryBuilder\InternetDocument\Sender;
use App\Services\FileService;
use Illuminate\Support\Facades\Artisan;
use Intervention\Image\Facades\Image;

class TestController extends Controller {
  /**
   * @var FileService
   */
  protected $fileService;

  /**
   * @var Counterparty
   */
  protected $counterparty;

  /**
   * @var InternetDocument
   */
  protected $internetDocument;

  /**
   * @var Address
   */
  protected $address;

  /**
   * @var BaseHttpClient
   */
  protected $httpClient;

  /**
   * TestController constructor.
   *
   * @param FileService $fileService
   * @param Counterparty $counterparty
   * @param InternetDocument $internetDocument
   * @param Address $address
   * @param BaseHttpClient $httpClient
   */
  public function __construct(FileService $fileService,
                              Counterparty $counterparty,
                              InternetDocument $internetDocument,
                              Address $address,
                              BaseHttpClient $httpClient) {
    $this->fileService = $fileService->setHttpClient($httpClient->clearDomain()->setProxy('36.90.177.41:8000'));
    $this->counterparty = $counterparty;
    $this->internetDocument = $internetDocument;
    $this->address = $address;
    $this->httpClient = $httpClient;
  }

  public function import() {
  	Artisan::call(ImportRozetkaXml::class);
  }

  public function deleteZipFiles() {
    dd(
      env('FRESH_TIME_ARCHIVE_FILE'),
      $this->fileService->oldModifiedFiles(DirectoriesStorage::ARCHIVE_FILE_PATH, env('FRESH_TIME_ARCHIVE_FILE'))
    );
  }

  /**
   * Fetching cities, warehouses from NovaPoshta API.
   *
   * @throws NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function cities() {
    $fileUrl = "https://drive.google.com/uc?export=view&id=1S7yk34jMBhuaGhZ6YfYzXVbos71IUXYL";
    $fileName = FileHelper::generateNewName("jpg");

    // dd($this->fileService->downloadFile($fileUrl, "products/{$fileName}"));

    // dd($this->httpClient->get('https://drive.google.com/uc', ['export' => 'view', 'id' => '1S7yk34jMBhuaGhZ6YfYzXVbos71IUXYL'])->getRawBody());

    // dd(Image::make('/var/www/drop/storage/app/public/products/1S7yk34jMBhuaGhZ6YfYzXVbos71IUXYL.jpg')->resize(150, 150)->save('/var/www/drop/storage/app/public/products/thumb_1S7yk34jMBhuaGhZ6YfYzXVbos71IUXYL.jpg'));

    // dd($this->address->fetchCities(new GetCitiesQueryBuilder())->first());
    dd($this->address->fetchWarehouses(new GetWarehousesQueryBuilder(1, 10)));
  }

  /**
   * Test creating internet document through NovaPoshta API.
   *
   * @throws NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function internetDocument() {
    /*$recipient = $this->counterparty->create(
      new CreateCounterpartyQueryBuilder(
        'Костя',
        'Игоревич',
        'Окороков',
        '+380634076212',
        'kostyanchikOk@gmail.com',
        CounterpartyTypes::PRIVATE_PERSON,
        CounterpartyProperties::RECIPIENT
      )
    );

    dd($recipient);*/

    $senderCounterparty = $this->counterparty
      ->fetch(new GetCounterpartiesQueryBuilder())
      ->first();

    $senderContactPerson = $this->counterparty
      ->fetchContactPersons(QueryBuilderFactory::createCounterpartyContactPersonsQueryBuilder($senderCounterparty))
      ->first();

    dd($senderCounterparty, $senderContactPerson);

    /*$recipientRef = $recipient->getRef();
    $recipientContactPerson = $this->counterparty
      ->fetchContactPersons(new GetCounterpartyContactPersonsQueryBuilder($recipientRef))
      ->first();*/

    $senderCityRef = 'db5c88c6-391c-11dd-90d9-001a92567626'; // Запорожье
    $senderWarehouseRef = '1ec09d1a-e1c2-11e3-8c4a-0050568002cf'; // 6 отделение

    $recipientCityRef = 'db5c88f5-391c-11dd-90d9-001a92567626'; // Львов
    $recipientWarehouseRef = '1a3437c0-f970-11e4-8a92-005056887b8d'; // 54 отделение

    /*$internetDocument = $this->internetDocument->save(
      new CreateInternetDocumentQueryBuilder(
        new Sender(
          $senderCityRef,
          $senderCounterparty->getRef(),
          $senderWarehouseRef,
          $senderContactPerson->getRef(),
          $senderContactPerson->getPhones()
        ),
        new Recipient(
          $recipientCityRef,
          $recipientRef,
          $recipientWarehouseRef,
          $recipientContactPerson->getRef(),
          $recipientContactPerson->getPhones()
        ),
        new BaseOptions(300)
      )
    );

    dd(
      $senderCounterparty,
      $senderContactPerson,
      $recipientContactPerson,
      $internetDocument
    );*/
  }
}