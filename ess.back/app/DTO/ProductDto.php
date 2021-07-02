<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class ProductDto implements Arrayable {
	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @var string
	 */
	protected $titleUk;

	/**
	 * @var string
	 */
	protected $titleRu;

	/**
	 * @var float|null
	 */
	protected $price;

  /**
   * @var UploadedFile|null
   */
  protected $fileXml;

  /**
   * @var integer|null
   */
  protected $deleteXml;

	/**
	 * @var string
	 */
	protected $subDescriptionUk;

	/**
	 * @var string
	 */
	protected $subDescriptionRu;

  /**
   * @var integer
   */
  protected $type;

	/**
	 * @var string
	 */
	protected $seoTitleUk;

	/**
	 * @var string
	 */
	protected $seoTitleRu;

	/**
	 * @var string
	 */
	protected $seoDescriptionUk;

	/**
	 * @var string
	 */
	protected $seoDescriptionRu;

	/**
	 * @var array
	 */
	protected $files;

	/**
	 * @var array
	 */
	public $picturesIdToDelete;

	/**
	 * @var array
	 */
	public $params;

	/**
	 * ProjectDto constructor.
	 *
	 * @param string $alias
	 * @param string $titleUk
	 * @param string $titleRu
	 * @param float $price
	 * @param UploadedFile|null $fileXml
	 * @param int|null $deleteXml
	 * @param string $subDescriptionUk
	 * @param string $subDescriptionRu
	 * @param int $type
	 * @param string $seoTitleUk
	 * @param string $seoTitleRu
	 * @param string $seoDescriptionUk
	 * @param string $seoDescriptionRu
	 * @param array $files
	 * @param array $picturesIdToDelete
	 * @param array $params
	 */
	public function __construct(string $alias,
	                            string $titleUk,
	                            string $titleRu,
                              float  $price,
	                            string $subDescriptionUk,
	                            string $subDescriptionRu,
                              int $type,
	                            string $seoTitleUk,
	                            string $seoTitleRu,
	                            string $seoDescriptionUk,
	                            string $seoDescriptionRu,
                              UploadedFile $fileXml = null,
                              int $deleteXml = null,
	                            array $files = [],
	                            array $picturesIdToDelete = [],
	                            array $params = []) {

		$this->alias = $alias;
		$this->titleUk = $titleUk;
		$this->titleRu = $titleRu;
		$this->price = $price;
    $this->fileXml = $fileXml;
    $this->deleteXml = $deleteXml;
		$this->subDescriptionUk = $subDescriptionUk;
		$this->subDescriptionRu = $subDescriptionRu;
		$this->type = $type;
		$this->seoTitleUk = $seoTitleUk;
		$this->seoTitleRu = $seoTitleRu;
		$this->seoDescriptionUk = $seoDescriptionUk;
		$this->seoDescriptionRu = $seoDescriptionRu;
		$this->files = $files;
		$this->picturesIdToDelete = $picturesIdToDelete;
		$this->params = $params;
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
   * @return integer
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * @return UploadedFile|null
   */
  public function getUploadedFile(): ?UploadedFile {
    return $this->fileXml;
  }

  /**
   * @return int|null
   */
  public function getDeleteXmlFile(): ?int {
    return $this->deleteXml;
  }

  /**
   * @return bool
   */
  public function hasFileXml(): bool {
    return !empty($this->fileXml);
  }

  /**
   * @return bool
   */
  public function hasDeleteXmlFile(): bool {
    return !empty($this->deleteXml);
  }

	/**
	 * @return string
	 */
	public function getSubDescriptionUk() {
		return $this->subDescriptionUk;
	}

	/**
	 * @return string
	 */
	public function getSubDescriptionRu() {
		return $this->subDescriptionRu;
	}

	/**
	 * @return string
	 */
	public function getSeoTitleUk() {
		return $this->seoTitleUk;
	}

	/**
	 * @return string
	 */
	public function getSeoTitleRu() {
		return $this->seoTitleRu;
	}

	/**
	 * @return string
	 */
	public function getSeoDescriptionUk() {
		return $this->seoDescriptionUk;
	}

	/**
	 * @return string
	 */
	public function getSeoDescriptionRu() {
		return $this->seoDescriptionRu;
	}

	/**
	 * @return array
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * @return array
	 */
	public function getPicturesIdToDelete() {
		return $this->picturesIdToDelete;
	}

	/**
	 * @return array
	 */
	public function getParams() {
		return $this->params;
	}

	/**
	 * @return bool
	 */
	public function hasFiles(): bool {
		return !empty($this->files);
	}

	/**
	 * @return bool
	 */
	public function hasToDeleteFiles(): bool {
		return !empty($this->picturesIdToDelete);
	}

	/**
	 * @return bool
	 */
	public function hasParams(): bool {
		return !empty($this->params);
	}

	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'alias' => $this->alias,
			'title_uk' => $this->titleUk,
			'title_ru' => $this->titleRu,
			'price' => $this->price,
			'sub_description_uk' => $this->subDescriptionUk,
			'sub_description_ru' => $this->subDescriptionRu,
			'type' => $this->type,
			'seo_title_uk' => $this->seoTitleUk,
			'seo_title_ru' => $this->seoTitleRu,
			'seo_description_uk' => $this->seoDescriptionUk,
			'seo_description_ru' => $this->seoDescriptionRu
		];
	}

	/**
	 * @param array $attributes
	 * @return ProductDto
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			(string)ArrayHelper::getNotEmptyValue($attributes, 'alias', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_ru', ''),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'price', 0.00),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'sub_description_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'sub_description_ru', ''),
      (int)ArrayHelper::getNotEmptyValue($attributes, 'type') ?: null,
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_description_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_description_ru', ''),
      ArrayHelper::getNotEmptyValue($attributes, 'fileXml', '') ?: null,
      (int)ArrayHelper::getNotEmptyValue($attributes, 'deleteXml', 0) ?: null,
			Arr::wrap(ArrayHelper::getNotEmptyValue($attributes, 'files', [])),
      Arr::wrap(ArrayHelper::getNotEmptyValue($attributes, 'pictures_id', [])),
      Arr::wrap(ArrayHelper::getNotEmptyValue($attributes, 'params', []))
		);
	}
}