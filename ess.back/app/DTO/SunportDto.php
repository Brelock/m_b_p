<?php

namespace App\DTO;

use App\Collection\FactoryDto\SunportParamDtoCollection;
use App\Collection\FactoryDto\SunportParamPictureDtoCollection;
use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class SunportDto implements Arrayable {
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
  protected $fileXls;

  /**
   * @var integer|null
   */
  protected $deleteXls;

	/**
	 * @var string
	 */
	protected $subTitleUk;

	/**
	 * @var string
	 */
	protected $subTitleRu;

	/**
	 * @var string
	 */
	protected $seoTitleUk;

	/**
	 * @var string
	 */
	protected $seoTitleRu;

  /**
   * @var UploadedFile|null
   */
  protected $filePicture;

  /**
   * @var integer|null
   */
  protected $deletePicture;

	/**
	 * @var SunportParamDtoCollection
	 */
	public $params;

	/**
	 * @var SunportParamPictureDtoCollection|null
	 */
	public $pictureParams;

	/**
	 * SunportDto constructor.
	 *
	 * @param string $alias
	 * @param string $titleUk
	 * @param string $titleRu
	 * @param float $price
	 * @param UploadedFile|null $fileXls
	 * @param int|null $deleteXls
	 * @param string $subTitleUk
	 * @param string $subTitleRu
	 * @param string $seoTitleUk
	 * @param string $seoTitleRu
   * @param UploadedFile|null $filePicture
   * @param int|null $deletePicture
	 * @param SunportParamDtoCollection|null $params
	 * @param SunportParamPictureDtoCollection|null $pictureParams
	 */
	public function __construct(string $alias,
	                            string $titleUk,
	                            string $titleRu,
                              float  $price,
	                            string $subTitleUk,
	                            string $subTitleRu,
	                            string $seoTitleUk,
	                            string $seoTitleRu,
                              UploadedFile $fileXls = null,
                              int $deleteXls = null,
                              UploadedFile $filePicture = null,
                              int $deletePicture = null,
                              SunportParamDtoCollection $params = null,
                              SunportParamPictureDtoCollection $pictureParams = null) {

		$this->alias = $alias;
		$this->titleUk = $titleUk;
		$this->titleRu = $titleRu;
		$this->price = $price;
    $this->fileXls = $fileXls;
    $this->deleteXls = $deleteXls;
		$this->subTitleUk = $subTitleUk;
		$this->subTitleRu = $subTitleRu;
		$this->seoTitleUk = $seoTitleUk;
		$this->seoTitleRu = $seoTitleRu;
    $this->filePicture = $filePicture;
    $this->deletePicture = $deletePicture;
		$this->params = $params ?: new SunportParamDtoCollection();
		$this->pictureParams = $pictureParams ?: new SunportParamPictureDtoCollection();
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
  public function getUploadedFileXls(): ?UploadedFile {
    return $this->fileXls;
  }

  /**
   * @return int|null
   */
  public function getDeleteXlsFile(): ?int {
    return $this->deleteXls;
  }

  /**
   * @return bool
   */
  public function hasFileXls(): bool {
    return !empty($this->fileXls);
  }

  /**
   * @return UploadedFile|null
   */
  public function getUploadedFilePicture(): ?UploadedFile {
    return $this->filePicture;
  }

  /**
   * @return int|null
   */
  public function getDeletePictureFile(): ?int {
    return $this->deletePicture;
  }

  /**
   * @return bool
   */
  public function hasFilePicture(): bool {
    return !empty($this->filePicture);
  }

  /**
   * @return bool
   */
  public function hasDeleteXlsFile(): bool {
    return !empty($this->deleteXls);
  }

  /**
   * @return bool
   */
  public function hasDeletePictureFile(): bool {
    return !empty($this->deletePicture);
  }

	/**
	 * @return string
	 */
	public function getSubTittleUk() {
		return $this->subTitleUk;
	}

	/**
	 * @return string
	 */
	public function getSubTitleRu() {
		return $this->subTitleRu;
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
	 * @return SunportParamDtoCollection
	 */
	public function getParams(): SunportParamDtoCollection {
		return $this->params;
	}

	/**
	 * @return SunportParamPictureDtoCollection
	 */
	public function getPictureParams() {
		return $this->pictureParams;
	}

	/**
	 * @return bool
	 */
	public function hasParams(): bool {
		return !empty($this->params);
	}

	/**
	 * @return bool
	 */
	public function hasPictureParams(): bool {
		return !empty($this->pictureParams);
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
			'sub_title_uk' => $this->subTitleUk,
			'sub_title_ru' => $this->subTitleRu,
			'seo_title_uk' => $this->seoTitleUk,
			'seo_title_ru' => $this->seoTitleRu,
		];
	}

	/**
	 * @param array $attributes
	 * @return SunportDto
	 */
	public static function createFromArray(array $attributes): self {
		return new self(
			(string)ArrayHelper::getNotEmptyValue($attributes, 'alias', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'title_ru', ''),
      (float)ArrayHelper::getNotEmptyValue($attributes, 'price', 0.00),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'sub_title_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'sub_title_ru', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_uk', ''),
			(string)ArrayHelper::getNotEmptyValue($attributes, 'seo_title_ru', ''),
      ArrayHelper::getNotEmptyValue($attributes, 'fileXls', '') ?: null,
      (int)ArrayHelper::getNotEmptyValue($attributes, 'deleteXls', 0) ?: null,
      ArrayHelper::getNotEmptyValue($attributes, 'filePicture', '') ?: null,
      (int)ArrayHelper::getNotEmptyValue($attributes, 'deletePicture', 0) ?: null,
      (new SunportParamDtoCollection(Arr::wrap(Arr::get($attributes, 'params', []))))->init(),
      (new SunportParamPictureDtoCollection(Arr::wrap(Arr::get($attributes, 'pictureParams', []))))->init()
		);
	}
}