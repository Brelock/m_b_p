<?php

namespace App\Support\Guzzle;

class BaseHttpRequest {
  /**
   * @var string
   */
  protected $method;

  /**
   * @var string
   */
  protected $uri;

  /**
   * @var array
   */
  protected $params;

  /**
   * BaseHttpRequest constructor.
   *
   * @param string $method
   * @param string $uri
   * @param array $params
   */
  public function __construct(string $method, string $uri, array $params = []) {
    $this->method = $method;
    $this->uri = $uri;
    $this->params = $params;
  }

  /**
   * @return string
   */
  public function getMethod(): string {
    return $this->method;
  }

  /**
   * @return string
   */
  public function getUri(): string {
    return $this->uri;
  }

  /**
   * @return array
   */
  public function getParams(): array {
    return $this->params;
  }
}