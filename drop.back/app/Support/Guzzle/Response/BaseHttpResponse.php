<?php

namespace App\Support\Guzzle\Response;

use JsonMachine\JsonMachine;
use Psr\Http\Message\ResponseInterface;

class BaseHttpResponse {
  /**
   * @var ResponseInterface
   */
  protected $response;

  /**
   * @var int
   */
  private $statusCode;

  /**
   * @var array
   */
  private $contentBody;

  /**
   * @var string
   */
  private $rawBody;

  /**
   * BaseHttpResponse constructor.
   *
   * @param ResponseInterface $response
   */
  public function __construct(ResponseInterface $response) {
    $this->response = $response;

    $this->statusCode = $response->getStatusCode();
    $this->setContentBody($response->getBody()->getContents());
  }

  /**
   * @return int
   */
  public function getStatusCode(): int {
    return (string)$this->statusCode;
  }

  /**
   * @return array
   */
  public function getBody(): array {
    return $this->contentBody && is_array($this->contentBody)
      ? $this->contentBody
      : [];
  }

  /**
   * @return string
   */
  public function getRawBody() {
    return $this->rawBody;
  }

  /**
   * @return string
   */
  public function encodeBody(): string {
    return json_encode($this->getBody());
  }

  /**
   * @param string $contentBody
   * @return $this
   */
  protected function setContentBody(string $contentBody) {
    // $contentBody = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $contentBody);
    // $contentBody = stripslashes($contentBody);

    $this->rawBody = $contentBody;

    if(!empty($contentBody) && isJson($contentBody)) {
      $jsonStream = JsonMachine::fromString($contentBody);
      foreach($jsonStream as $key => $data)
        $this->contentBody[$key] = $data;
    }

    return $this;
  }
}