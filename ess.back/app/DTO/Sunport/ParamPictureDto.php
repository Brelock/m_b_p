<?php

namespace App\DTO\Sunport;

use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;

class ParamPictureDto implements Arrayable {
  /**
   * @var string
   */
  protected $titleUk;

  /**
   * @var string
   */
  protected $titleRu;

  /**
   * @var UploadedFile|null
   */
  protected $filePicture;

  /**
   * @var int|null
   */
  protected $id;

  /**
   * SunportParamPictureDto constructor.
   *
   * @param string $titleUk
   * @param string $titleRu
   * @param UploadedFile|null $filePicture
   * @param int|null $id
   */
  public function __construct(string $titleUk,
                              string $titleRu,
                              UploadedFile $filePicture = null,
                              int $id = null) {

    $this->titleUk = $titleUk;
    $this->titleRu = $titleRu;
    $this->filePicture = $filePicture;
    $this->id = $id;
  }

  /**
   * @return int|null
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
   * @return UploadedFile|null
   */
  public function getUploadedFilePicture(): ?UploadedFile {
    return $this->filePicture;
  }

  /**
   * @return bool
   */
  public function hasUploadedFilePicture(): bool {
    return !empty($this->filePicture);
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
    ];
  }

  /**
   * @param array $attributes
   * @return ParamPictureDto
   */
  public static function createFromArray(array $attributes): self {
    return new self(
      (string)ArrayHelper::getNotEmptyValue($attributes, 'title_uk'),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'title_ru'),
      ArrayHelper::getNotEmptyValue($attributes, 'filePicture', '') ?: null,
      (int)ArrayHelper::getNotEmptyValue($attributes, 'id', 0) ?: null
    );
  }
}