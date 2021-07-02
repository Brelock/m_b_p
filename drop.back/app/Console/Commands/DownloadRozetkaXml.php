<?php

namespace App\Console\Commands;

use App\Helpers\FileHelper;
use App\Services\FileService;
use App\Support\Guzzle\BaseHttpClient;
use Illuminate\Console\Command;

class DownloadRozetkaXml extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'download:rozetkaXml';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Download xml file from Rozetka.';

  /**
   * @var FileService
   */
  protected $fileService;

  /**
   * @var BaseHttpClient
   */
  protected $httpClient;

  /**
   * DownloadRozetkaXml constructor.
   *
   * @param FileService $fileService
   * @param BaseHttpClient $httpClient
   */
  public function __construct(FileService $fileService, BaseHttpClient $httpClient) {
    $this->fileService = $fileService;
    $this->httpClient = $httpClient;

    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function handle() {
    $this->info("Start download file...\n");

    $downloadingUrl = env('IMPORT_XML_FILE_URL');
    $folderPath = env('IMPORT_XML_FILE_PATH');
    $newFileName = env('IMPORT_XML_FILE_NAME', FileHelper::generateNewName(FileHelper::getExtension($downloadingUrl)));
    $this->fileService->downloadFile($downloadingUrl, "{$folderPath}/{$newFileName}", $this->httpClient);

    $this->info("End download file!!!\n");
  }
}
