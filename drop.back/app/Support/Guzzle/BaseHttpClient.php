<?php

namespace App\Support\Guzzle;

use App\Support\Guzzle\Response\BaseHttpResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Arr;

abstract class BaseHttpClient {
  /**
   * @var string
   */
  protected $domain;

  /**
   * @var int
   */
  protected $timeoutConnection = 3600;

  /**
   * @var bool
   */
  protected $logging = true;

  /**
   * @var bool
   */
  protected $debugging = false;

  /**
   * @var string|array|false
   */
  protected $proxy = false;

  /**
   * BaseHttpClient constructor.
   *
   * @param array $config
   */
  public function __construct(array $config = []) {
    $this->init($config);
  }

  /**
   * @param array $config
   */
  protected function init(array $config = []): void {
    $this->domain = (string)Arr::get($config, 'domain');
    $this->timeoutConnection = (string)Arr::get($config, 'timeout_connection', $this->timeoutConnection);
    $this->logging = (bool)Arr::get($config, 'logging', $this->logging);
    $this->debugging = (bool)Arr::get($config, 'debugging', $this->debugging);
    $this->proxy = Arr::get($config, 'proxy', $this->proxy);
  }

  /**
   * @return array
   */
  protected function getClientConfig(): array {
    return array_merge(
      [
        'base_uri' => $this->domain,
        'verify' => false,
        'debug' => $this->debugging,
        'timeout' => $this->timeoutConnection,
        'allow_redirects' => true,
        'headers' => [
          'Content-type' => 'applicatipon/json',
        ],
      ],

      ($this->proxy ? ['proxy' => $this->proxy] : [])
    );
  }

  /**
   * @return Client
   */
  protected function getClient(): Client {
    return new Client($this->getClientConfig());
  }

  /**
   * @param BaseHttpRequest $request
   * @param BaseHttpResponse $response
   */
  protected function logRequest(BaseHttpRequest $request, BaseHttpResponse $response): void {
    // TODO: push request to log stack
  }

  /**
   * @return BaseHttpClient
   */
  public function clearDomain() : self {
    $this->domain = '';
    return $this;
  }

  /**
   * @param bool $enable
   * @return BaseHttpClient
   */
  public function enableLogging(bool $enable = true) : self {
    $this->logging = $enable;
    return $this;
  }

  /**
   * @param bool $enable
   * @return BaseHttpClient
   */
  public function enableDebugging(bool $enable = true) : self {
    $this->debugging = $enable;
    return $this;
  }

  /**
   * @param string $domain
   * @return self
   */
  public function setDomain(string $domain): self {
    $this->domain = $domain;
    return $this;
  }

  /**
   * @param array|false|string $proxy
   * @return self
   */
  public function setProxy($proxy): self {
    $this->proxy = $proxy;
    return $this;
  }

  /**
   * @param string $action
   * @param array $params
   * @param array $options
   *
   * @return BaseHttpResponse
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function get(string $action, array $params = [], array $options = []): BaseHttpResponse {
    return $this->request(
      new BaseHttpRequest(
        'GET',
        $action,
        array_merge([
          'query' => $params,
        ], $options)
      )
    );
  }

  /**
   * @param string $action
   * @param array $params
   * @param array $queryParams
   *
   * @return BaseHttpResponse
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function post(string $action, array $params = [], array $queryParams = []): BaseHttpResponse {
    return $this->request(new BaseHttpRequest('POST', $action, [
      'query' => $queryParams,
      'form_params' => $params,
    ]));
  }

  /**
   * @param BaseHttpRequest $request
   *
   * @return BaseHttpResponse
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function request(BaseHttpRequest $request): BaseHttpResponse {
    try {
      $response = new BaseHttpResponse($this->getClient()->request($request->getMethod(), $request->getUri(), $request->getParams()));
    } catch (\Exception $exception) {
      $response = new BaseHttpResponse(new Response());
    }

    if ($this->logging)
      $this->logRequest($request, $response);

    return $response;
  }
}