<?php

namespace App\Services;

use App\DTO\CallbackDto;
use App\Models\Callback;
use App\Services\Helpers\PromiseActionsTrait;

class CallbackService {
  use PromiseActionsTrait;

  /**
   * @var Callback
   */
  private $callback;

	/**
	 * CallbackService constructor.
	 *
	 * @param Callback $callback
	 */
  public function __construct(Callback $callback) {
    $this->callback = $callback;
  }

	/**
	 * @return Callback
	 */
  public function getCallback(): Callback {
    return $this->callback;
  }

	/**
	 * @param CallbackDto $dto
	 * @return $this
	 */
  public function changeAttributes(CallbackDto $dto): self {
    $this->callback->fill($dto->toArray());
    return $this;
  }

	/**
	 * @return $this
	 */
  public function commitChanges(): self {
    $this->callback->save();

    $this->releasePromiseActions();

    return $this;
  }
}