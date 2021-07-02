<?php

namespace App\Import\Helpers;

use Illuminate\Support\Arr;

class ParseUrl {
  /**
   * @var string
   */
  protected $baseUri;

  /**
   * ParseUrl constructor.
   *
   * @param string $baseUri
   */
  public function __construct(string $baseUri) {
    $this->baseUri = $baseUri;
  }

  /**
   * @return string
   */
  public function getBaseUri(): string {
    return $this->baseUri;
  }

  /**
   * @return string
   */
  public function getScheme() : string {
    return Arr::get($this->parseUrl(), 'scheme', '');
  }

  /**
   * @return string
   */
  public function getHost() : string {
    return Arr::get($this->parseUrl(), 'host', '');
  }

  /**
   * @return string
   */
  public function getPath() : string {
    return Arr::get($this->parseUrl(), 'path', '');
  }

  /**
   * @return array
   */
  public function getQuery() : array {
    $query = Arr::get($this->parseUrl(), 'query', '');

    parse_str($query, $options);

    return $options;
  }

  /**
   * @return string
   */
  public function buildDomain() : string {
    $scheme = $this->getScheme();
    $host = $this->getHost();

    return "{$scheme}://{$host}";
  }

  /**
   * @return string
   */
  public function buildBaseUriWithoutQuery() : string {
    $domain = $this->buildDomain();
    $path = $this->getPath();

    return "{$domain}{$path}";
  }

  /**
   * @return array
   */
  protected function parseUrl() : array {
    return parse_url($this->baseUri);
  }
}