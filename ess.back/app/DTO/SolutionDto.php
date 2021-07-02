<?php

namespace App\DTO;

use App\Enums\SolutionsType;
use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;

class SolutionDto implements Arrayable {
	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $titleUk;

	/**
	 * @var string|null
	 */
	protected $titleRu;

	/**
	 * @var integer|null
	 */
	protected $power;

	/**
	 * @var string|null
	 */
	protected $solutionUrl;

  /**
   * @var UploadedFile|null
   */
  protected $uploadedFile;

  /**
   * @var integer|null
   */
  protected $deletePicture;

	/**
	 * ProjectDto constructor.
	 *
	 * @param string $alias
	 * @param string $type
	 * @param string $titleUk
	 * @param string|null $titleRu
	 * @param integer|null $power
	 * @param string|null $solutionUrl
   * @param UploadedFile|null $uploadedFile
   * @param integer|null $deletePicture
	 */
	public function __construct(string $alias,
	                            string $type,
	                            string $titleUk,
	                            string $titleRu,
                              int $power = null,
                              string $solutionUrl = null,
                              UploadedFile $uploadedFile = null,
                              int $deletePicture = null) {

		$this->alias = $alias;
		$this->type = $type;
		$this->titleUk = $titleUk;
		$this->titleRu = $titleRu;
		$this->power = $power;
		$this->solutionUrl = $solutionUrl;
		$this->uploadedFile = $uploadedFile;
		$this->deletePicture = $deletePicture;

	}

	/**
	 * @return string
	 */
	public function getAlias() {
		return $this->alias;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
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
   * @return UploadedFile|null
   */
  public function getUploadedFile(): ?UploadedFile {
    return $this->uploadedFile;
  }

  /**
   * @return bool
   */
  public function hasFile(): bool {
    return !empty($this->uploadedFile);
  }

  /**
   * @return int|null
   */
  public function getDeletePicture(): ?int {
    return $this->deletePicture;
  }

  /**
   * @return bool
   */
  public function hasDeletePicture(): bool {
    return !empty($this->deletePicture);
  }

	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'alias' => $this->alias,
			'type' => $this->type,
			'title_uk' => $this->titleUk,
			'title_ru' => $this->titleRu,
			'power' => $this->power,
			'solution_url' => $this->solutionUrl,
		];
	}

	/**
	 * @param array $attributes
	 * @return SolutionDto
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			(string)ArrayHelper::getNotEmptyValue($attributes, 'alias', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'type', SolutionsType::PRIVATE_PERSON),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_ru', ''),
			(int)ArrayHelper::getNotEmptyValue($attributes, 'power') ?: null,
			(string)ArrayHelper::getNotEmptyValue($attributes, 'solution_url', ''),
      ArrayHelper::getNotEmptyValue($attributes, 'file', '') ?: null,
      (int)ArrayHelper::getNotEmptyValue($attributes, 'deletePicture', 0) ?: null
		);
	}
}