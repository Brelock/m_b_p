<?php

namespace App\NovaPoshta\Models;

use App\Support\Guzzle\BaseHttpRequest;
use App\Support\Guzzle\Response\BaseHttpResponse;
use App\NovaPoshta\Exceptions\NovaPoshtaException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Arr;

class BaseModel {
  /**
   * @var Transport
   */
  protected $transport;

  /**
   * @var string
   */
  protected $modelName = 'Common';

  /**
   * BaseModel constructor.
   *
   * @param Transport $transport
   */
  public function __construct(Transport $transport) {
    $this->transport = $transport;

    $this->modelName = class_basename(static::class);
  }

  /**
   * @return string
   */
  public function getModelName(): string {
    return $this->modelName;
  }

  /**
   * @param string $modelName
   * @return self
   */
  public function setModelName(string $modelName): self {
    $this->modelName = $modelName;
    return $this;
  }

  /**
   * @param string $methodName
   * @param array $methodProperties
   *
   * @return BaseHttpResponse
   *
   * @throws NovaPoshtaException
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function callMethodAPI(string $methodName, array $methodProperties): BaseHttpResponse {
    $response = $this->transport->getHttpClient()->request(new BaseHttpRequest('POST', '', [
      RequestOptions::JSON => [
        "apiKey" => $this->transport->getApiKey(),
        "modelName" => $this->modelName,
        "calledMethod" => $methodName,
        "methodProperties" => $methodProperties,
      ],
    ]));

    $result = $response->getBody();
    if(Arr::has($result, 'errors') && !empty(Arr::get($result, 'errors')))
      throw $this->createException($response);

    return $response;
  }

  /**
   * @param BaseHttpResponse $response
   * @return NovaPoshtaException
   */
  protected function createException(BaseHttpResponse $response) : NovaPoshtaException {
    $errors = Arr::get($response->getBody(), 'errors');

    return new NovaPoshtaException((is_array($errors) ? join("\n", $errors) : ($errors ?: 'Request API is failed.')));
  }
}