<?php

namespace App\DTO;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class NewsDto implements Arrayable {
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
	 * @var string
	 */
	protected $textUk;

	/**
	 * @var string
	 */
	protected $textRu;

	/**
	 * @var boolean
	 */
	protected $isPublished;

	/**
	 * @var Carbon
	 */
	protected $publicationDate;

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
	 * NewsDto constructor.
	 *
	 * @param string $alias
	 * @param string $titleUk
	 * @param string $titleRu
	 * @param string $textUk
	 * @param string $textRu
	 * @param string $seoTitleUk
	 * @param string $seoTitleRu
	 * @param string $seoDescriptionUk
	 * @param string $seoDescriptionRu
	 * @param bool $isPublished
	 * @param Carbon|null $publicationDate
	 * @param array $files
	 * @param UploadedFile|null $mainFile
	 * @param array $picturesIdToDelete
	 */
	public function __construct(string $alias,
	                            string $titleUk,
	                            string $titleRu,
	                            string $textUk,
	                            string $textRu,
	                            string $seoTitleUk,
	                            string $seoTitleRu,
	                            string $seoDescriptionUk,
	                            string $seoDescriptionRu,
	                            bool $isPublished = false,
	                            Carbon $publicationDate = null,
	                            array $files = [],
	                            UploadedFile $mainFile = null,
	                            array $picturesIdToDelete = []) {

		$this->alias = $alias;
		$this->titleUk = $titleUk;
		$this->titleRu = $titleRu;
		$this->textUk = $textUk;
		$this->textRu = $textRu;
		$this->seoTitleUk = $seoTitleUk;
		$this->seoTitleRu = $seoTitleRu;
		$this->seoDescriptionUk = $seoDescriptionUk;
		$this->seoDescriptionRu = $seoDescriptionRu;
		$this->isPublished = $isPublished;
		$this->publicationDate = $publicationDate;
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
	public function getTextUk() {
		return $this->textUk;
	}

	/**
	 * @return string
	 */
	public function getTextRu() {
		return $this->textRu;
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
	 * @return bool|null
	 */
	public function getIsPublished() {
		return $this->isPublished;
	}

	/**
	 * @return Carbon|null
	 */
	public function getPublicationDate() {
		return $this->publicationDate;
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
			'title_uk' => $this->titleUk,
			'title_ru' => $this->titleRu,
			'text_uk' => $this->textUk,
			'text_ru' => $this->textRu,
			'is_published' => $this->isPublished,
			'publication_date' => $this->publicationDate,
			'seo_title_uk' => $this->seoTitleUk,
			'seo_title_ru' => $this->seoTitleRu,
			'seo_description_uk' => $this->seoDescriptionUk,
			'seo_description_ru' => $this->seoDescriptionRu
		];
	}

	/**
	 * @param array $attributes
	 * @return NewsDto
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			(string)ArrayHelper::getNotEmptyValue($attributes, 'alias', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'text_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'text_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_description_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_description_ru', ''),
			(bool)ArrayHelper::getNotEmptyValue($attributes, 'is_published')?: false,
      ArrayHelper::getNotEmptyValue($attributes, 'publication_date')?: null,
			Arr::wrap(ArrayHelper::getNotEmptyValue($attributes, 'files', [])),
			ArrayHelper::getNotEmptyValue($attributes, 'mainFile') ?: null,
			ArrayHelper::getNotEmptyValue($attributes, 'pictures_id', [])
		);
	}
}