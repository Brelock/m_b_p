<?php

namespace App\NovaPoshta\Models;

use App\NovaPoshta\Connector\HttpConnector;

class Transport {
  /**
   * @var string
   */
  protected $apiKey;

  /**
   * @var HttpConnector
   */
  protected $httpClient;

  /**
   * Transport constructor.
   *
   * @param string $apiKey
   * @param HttpConnector $httpClient
   */
  public function __construct(string $apiKey, HttpConnector $httpClient) {
    $this->apiKey = $apiKey;
    $this->httpClient = $httpClient;
  }

  /**
   * @return string
   */
  public function getApiKey(): string {
    return $this->apiKey;
  }

  /**
   * @return HttpConnector
   */
  public function getHttpClient(): HttpConnector {
    return $this->httpClient;
  }
}