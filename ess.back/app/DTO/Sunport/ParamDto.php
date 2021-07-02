<?php

namespace App\DTO\Sunport;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;

class ParamDto implements Arrayable {
	/**
	 * @var string
	 */
	protected $titleUk;

	/**
	 * @var string
	 */
	protected $titleRu;

	/**
	 * @var string
	 */
	protected $valueUk;

	/**
	 * @var string
	 */
	protected $valueRu;

  /**
   * @var int|null
   */
	protected $id;

	/**
	 * SunportParamDto constructor.
	 *
	 * @param string $titleUk
	 * @param string $titleRu
	 * @param string $valueUk
	 * @param string $valueRu
	 * @param int|null $id
	 */
	public function __construct(string $titleUk,
	                            string $titleRu,
	                            string $valueUk,
	                            string $valueRu,
                              int $id = null) {

		$this->titleUk = $titleUk;
		$this->titleRu = $titleRu;
		$this->valueUk = $valueUk;
		$this->valueRu = $valueRu;
		$this->id = $id;

	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitleUk() {
		return $this->titleUk;
	}

	/**
	 * @return string
	 */
	public function getTitleRu() {
    return $this->titleRu;
  }

	/**
	 * @return string
	 */
	public function getValueUk() {
		return $this->valueUk;
	}

	/**
	 * @return string
	 */
	public function getValueRu() {
		return $this->valueRu;
	}


  /**
   * @return bool
   */
  public function hasId() {
     return !empty($this->id);
  }

	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'title_uk' => $this->titleUk,
			'title_ru' => $this->titleRu,
			'value_uk' => $this->valueUk,
			'value_ru' => $this->valueRu,
		];
	}

	/**
	 * @param array $attributes
	 * @return ParamDto
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_ru'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'value_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'value_ru'),
			(int)ArrayHelper::getNotEmptyValue($attributes, 'id', 0) ?: null
		);
	}
}
