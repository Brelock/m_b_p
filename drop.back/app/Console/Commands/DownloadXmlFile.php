<?php

namespace App\Console\Commands;

use App\Services\FileService;
use App\Support\Guzzle\BaseHttpClient;
use Illuminate\Console\Command;

class DownloadXmlFile extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'download:xmlFile {url} {path}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Download file of Xml';

  /**
   * @var FileService
   */
  protected $fileService;

  /**
   * @var BaseHttpClient
   */
  protected $httpClient;

  /**
   * DownloadXmlFile constructor.
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

    $this->fileService->downloadFile($this->argument('url'), $this->argument('path'), $this->httpClient);

    $this->info("End download file!!!\n");
  }
}