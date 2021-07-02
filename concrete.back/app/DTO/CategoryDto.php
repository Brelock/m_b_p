<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class CategoryDto {
  /**
   * @var string
   */
  public $title;

  /**
   * @var string
   */
  public $formula;

  /**
   * @var UploadedFile[]|array
   */
  public $files;

	/**
	 * CategoryDto constructor.
	 *
	 * @param string $title
	 * @param string $formula
	 * @param UploadedFile[]|array $files
	 */
  public function __construct(string $title,
                              string $formula,
	                            array $files = []) {
    $this->title = $title;
    $this->formula = $formula;
    $this->files = $files;
  }

  /**
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @return string
   */
  public function getFormula(): string {
    return $this->formula;
  }

  /**
   * @return UploadedFile[]|array
   */
  public function getFiles(): array {
    return $this->files;
  }

	/**
	 * @return bool
	 */
	public function hasFiles() : bool {
		return !empty($this->files);
	}

  /**
   * @return array
   */
  public function toArray(): array {
    return [
      'title' => $this->title,
      'formula' => $this->formula,
    ];
  }

  /**
   * @param array $attributes
   * @return CategoryDto
   */
  public static function createFromArray(array $attributes): self {
    return new self(
      ArrayHelper::getNotEmptyValue($attributes, 'title', ''),
      ArrayHelper::getNotEmptyValue($attributes, 'formula', ''),
	    Arr::wrap(ArrayHelper::getNotEmptyValue($attributes, 'files', []))
    );
  }
}
