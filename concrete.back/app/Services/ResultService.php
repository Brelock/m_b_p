<?php

namespace App\Services;

use App\DTO\ResultDto;
use App\Models\Result;
use App\Services\Helpers\PromiseActionsTrait;

class ResultService {
  use PromiseActionsTrait;

  /**
   * @var Result
   */
  private $result;

	/**
	 * ResultService constructor.
	 *
	 * @param Result $result
	 */
  public function __construct(Result $result) {
    $this->result = $result;
  }

	/**
	 * @return Result
	 */
  public function getRequest(): Result {
    return $this->result;
  }

	/**
	 * @param ResultDto $dto
	 * @return $this
	 */
  public function changeAttributes(ResultDto $dto): self {
    $this->result->fill($dto->toArray());
    return $this;
  }

	/**
	 * @return $this
	 */
  public function commitChanges(): self {
    $this->result->save();

    $this->releasePromiseActions();

    return $this;
  }

	/**
	 * @param array $params
	 * @param string $formula
	 * @return $this
	 */
  public function calculation(array $params, string $formula): self {
	  $resultFormula = str_replace(array_keys($params), $params, $formula);
	  $this->result->result = round(math_eval($resultFormula), 2);

  	return $this;
  }
}