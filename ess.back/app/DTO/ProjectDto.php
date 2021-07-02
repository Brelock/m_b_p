<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class ProjectDto implements Arrayable {
	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @var bool
	 */
	protected $isMain;

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
	protected $addressUk;

	/**
	 * @var string
	 */
	protected $addressRu;

	/**
	 * @var string
	 */
	protected $optionsUk;

	/**
	 * @var string
	 */
	protected $optionsRu;

	/**
	 * @var string
	 */
	protected $exploitationUk;

	/**
	 * @var string
	 */
	protected $exploitationRu;

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
	 * @var UploadedFile|null
	 */
	protected $mainFile;

	/**
	 * @var array
	 */
	public $picturesIdToDelete;

	/**
	 * ProjectDto constructor.
	 *
	 * @param string $alias
	 * @param bool $isMain
	 * @param string $titleUk
	 * @param string $titleRu
	 * @param string $addressUk
	 * @param string $addressRu
	 * @param string $optionsUk
	 * @param string $optionsRu
	 * @param string $exploitationUk
	 * @param string $exploitationRu
	 * @param string $seoTitleUk
	 * @param string $seoTitleRu
	 * @param string $seoDescriptionUk
	 * @param string $seoDescriptionRu
	 * @param array $files
	 * @param UploadedFile|null $mainFile
	 * @param array $picturesIdToDelete
	 */
	public function __construct(string $alias,
	                            string $titleUk,
	                            string $titleRu,
	                            string $addressUk,
	                            string $addressRu,
	                            string $optionsUk,
	                            string $optionsRu,
	                            string $exploitationUk,
	                            string $exploitationRu,
	                            string $seoTitleUk,
	                            string $seoTitleRu,
	                            string $seoDescriptionUk,
	                            string $seoDescriptionRu,
                              bool $isMain = false,
	                            array $files = [],
	                            UploadedFile $mainFile = null,
	                            array $picturesIdToDelete = []) {

		$this->alias = $alias;
		$this->isMain = $isMain;
		$this->titleUk = $titleUk;
		$this->titleRu = $titleRu;
		$this->addressUk = $addressUk;
		$this->addressRu = $addressRu;
		$this->optionsUk = $optionsUk;
		$this->optionsRu = $optionsRu;
		$this->exploitationUk = $exploitationUk;
		$this->exploitationRu = $exploitationRu;
		$this->seoTitleUk = $seoTitleUk;
		$this->seoTitleRu = $seoTitleRu;
		$this->seoDescriptionUk = $seoDescriptionUk;
		$this->seoDescriptionRu = $seoDescriptionRu;
		$this->files = $files;
		$this->mainFile = $mainFile;
		$this->picturesIdToDelete = $picturesIdToDelete;
	}

	/**
	 * @return string
	 */
	public function getAlias() {
		return $this->alias;
	}


  /**
   * @return bool
   */
  public function getIsMain() {
    return $this->isMain;
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
  public function getAddressUk() {
    return $this->addressUk;
  }

  /**
   * @return string
   */
  public function getAddressRu() {
    return $this->addressRu;
  }

	/**
	 * @return string
	 */
	public function getOptionsUk() {
		return $this->optionsUk;
	}

	/**
	 * @return string
	 */
	public function getOptionsRu() {
		return $this->optionsRu;
	}

	/**
	 * @return string
	 */
	public function getExploitationUk() {
		return $this->exploitationUk;
	}

	/**
	 * @return string
	 */
	public function getExploitationRu() {
		return $this->exploitationRu;
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
	 * @return UploadedFile|null
	 */
	public function getMainFile() {
		return $this->mainFile;
	}

	/**
	 * @return array
	 */
	public function getPicturesIdToDelete() {
		return $this->picturesIdToDelete;
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
	public function hasMainFile(): bool {
		return !empty($this->mainFile);
	}

	/**
	 * @return bool
	 */
	public function hasToDeleteFiles(): bool {
		return !empty($this->picturesIdToDelete);
	}

	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'alias' => $this->alias,
			'is_main' => $this->isMain,
			'title_uk' => $this->titleUk,
			'title_ru' => $this->titleRu,
			'address_uk' => $this->addressUk,
			'address_ru' => $this->addressRu,
			'options_uk' => $this->optionsUk,
			'options_ru' => $this->optionsRu,
			'exploitation_uk' => $this->exploitationUk,
			'exploitation_ru' => $this->exploitationRu,
			'seo_title_uk' => $this->seoTitleUk,
			'seo_title_ru' => $this->seoTitleRu,
			'seo_description_uk' => $this->seoDescriptionUk,
			'seo_description_ru' => $this->seoDescriptionRu
		];
	}

	/**
	 * @param array $attributes
	 * @return ProjectDto
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			(string)ArrayHelper::getNotEmptyValue($attributes, 'alias', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'address_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'address_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'options_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'options_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'exploitation_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'exploitation_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_description_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_description_ru', ''),
      (bool)ArrayHelper::getNotEmptyValue($attributes, 'is_main')?: false,
			Arr::wrap(ArrayHelper::getNotEmptyValue($attributes, 'files', [])),
			ArrayHelper::getNotEmptyValue($attributes, 'mainFile') ?: null,
			ArrayHelper::getNotEmptyValue($attributes, 'pictures_id', [])
		);
	}
}