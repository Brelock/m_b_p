<?php

namespace App\Console\Commands;

use App\Helpers\FileHelper;
use App\Services\FileService;
use App\Support\Guzzle\BaseHttpClient;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class TestDownloadPicture extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'download:test';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * @var FileService
   */
  protected $fileService;

  /**
   * @var BaseHttpClient
   */
  protected $httpClient;

  /**
   * Create a new command instance.
   *
   * @param  FileService $fileService
   * @param  BaseHttpClient $httpClient
   *
   * @return void
   */
  public function __construct(FileService $fileService, BaseHttpClient $httpClient) {
    $this->fileService = $fileService;

    $this->httpClient = $httpClient
      ->clearDomain()
      ->setProxy('101.255.122.73:8080');

    // 101.0.7.9:60663
    // 137.59.161.163:32372
    // 101.255.122.73:8080

    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function handle() {
    $this->info("Start downloading...\n");

    $fileUrl = "https://drive.google.com/uc?export=view&id=1S7yk34jMBhuaGhZ6YfYzXVbos71IUXYL";

    $currentProxyIndex = 0;
    $proxies = [
      "101.0.7.9:60663",
      "137.59.161.163:32372",
      "101.255.122.73:8080",
    ];

    for ($i = 0; $i <= 50; $i++) {
      $fileName = FileHelper::generateNewName("jpg");

      if ($i % 3)
        $currentProxyIndex = $currentProxyIndex + 1 > count($proxies) ? 0 : $currentProxyIndex + 1;

      $this->httpClient->setProxy(Arr::get($proxies, $currentProxyIndex));

      if ($this->fileService->downloadFile($fileUrl, "products/{$fileName}", $this->httpClient))
        $this->info("File {$i}: {$fileName} is uploaded.\n");
      else {
        $this->info("File {$i}: {$fileName} is not uploaded.\n");

        break;
      }

      $this->info("Sleeping...\n");

      sleep(30);
    }

    $this->info("End downloading pictures.\n");
  }
}
