<?php

namespace App\Services;

use App\DTO\RequestDto;
use App\Models\Request;
use App\Services\Helpers\PromiseActionsTrait;

class RequestService {
  use PromiseActionsTrait;

  /**
   * @var Request
   */
  private $request;

	/**
	 * RequestService constructor.
	 *
	 * @param Request $request
	 */
  public function __construct(Request $request) {
    $this->request = $request;
  }

	/**
	 * @return Request
	 */
  public function getRequest(): Request {
    return $this->request;
  }

	/**
	 * @param RequestDto $dto
	 * @return $this
	 */
  public function changeAttributes(RequestDto $dto): self {
    $this->request->fill($dto->toArray());
    return $this;
  }

	/**
	 * @return $this
	 */
  public function commitChanges(): self {
    $this->request->save();

    $this->releasePromiseActions();

    return $this;
  }
}