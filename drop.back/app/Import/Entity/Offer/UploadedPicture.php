<?php

namespace App\Import\Entity\Offer;

use App\Helpers\ArrayHelper;
use App\Import\Entity\BaseEntity;
use Illuminate\Support\Arr;

class UploadedPicture extends BaseEntity {
  /**
   * @var string
   */
  protected $originalPictureName;

  /**
   * @var string|null
   */
  protected $thumbPictureName;

  /**
   * @var string|null
   */
  protected $path;

  /**
   * @var Picture|null
   */
  protected $picture;

  /**
   * UploadedPicture constructor.
   *
   * @param string $originalPictureName
   * @param string|null $thumbPictureName
   * @param string|null $path
   * @param Picture|null $picture
   */
  public function __construct(string $originalPictureName, ?string $thumbPictureName, ?string $path, ?Picture $picture = null) {
    $this->originalPictureName = $originalPictureName;
    $this->thumbPictureName = $thumbPictureName;
    $this->path = $path;
    $this->picture = $picture;
  }

  /**
   * @return string
   */
  public function getOriginalPictureName(): string {
    return $this->originalPictureName;
  }

  /**
   * @return string|null
   */
  public function getThumbPictureName(): ?string {
    return $this->thumbPictureName;
  }

  /**
   * @param  string $thumbPictureName
   * @return self
   */
  public function setThumbPictureName(string $thumbPictureName): self {
    $this->thumbPictureName = $thumbPictureName;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getPath(): ?string {
    return $this->path;
  }

  /**
   * @return Picture|null
   */
  public function getPicture(): ?Picture {
    return $this->picture;
  }

  /**
   * @return array
   */
  public function toArray() : array {
    return ArrayHelper::exceptEmptyValues([
      'file_name' => $this->originalPictureName,
      'thumbnail_name' => $this->thumbPictureName,
    ]);
  }

  /**
   * @param array $attributes
   * @return BaseEntity
   */
  public static function mapFromArray(array $attributes): BaseEntity {
    return new self(
      (string)Arr::get($attributes, 'original_file_name', ''),
      (string)Arr::get($attributes, 'original_thumbnail_name', ''),
      (string)Arr::get($attributes, 'path', ''),
      null
    );
  }
}