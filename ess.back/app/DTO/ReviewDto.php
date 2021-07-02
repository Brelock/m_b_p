<?php


namespace App\DTO;


use App\Enums\ReviewsType;
use App\Helpers\ArrayHelper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;

class ReviewDto implements Arrayable {
  /**
   * @var string|null
   */
  protected $title;

  /**
   * @var integer
   */
  protected $type;

  /**
   * @var string|null
   */
  protected $textRu;

  /**
   * @var string|null
   */
  protected $textUk;

  /**
   * @var string|null
   */
  protected $authorNameRu;


  /**
   * @var string|null
   */
  protected $authorNameUk;

  /**
   * @var string|null
   */
  protected $workUrl;

  /**
   * @var string|null
   */
  protected $videoUrl;

  /**
   * @var UploadedFile|null
   */
  protected $uploadedFile;

  /**
   * @var integer|null
   */
  protected $deletePicture;

  /**
   * ReviewDto constructor.
   *
   * @param string|null $title
   * @param integer $type
   * @param string|null $textRu
   * @param string|null $textUk
   * @param string|null $authorNameRu
   * @param string|null $authorNameUk
   * @param string|null $workUrl
   * @param string|null $videoUrl
   * @param UploadedFile|null $uploadedFile
   * @param integer|null $deletePicture
   */
  public function __construct(int $type,
                              ?string $title = null,
                              ?string $textRu = null,
                              ?string $textUk = null,
                              ?string $authorNameRu = null,
                              ?string $authorNameUk = null,
                              ?string $workUrl = null,
                              ?string $videoUrl = null,
                              UploadedFile $uploadedFile = null,
                              int $deletePicture = null) {
    $this->title = $title;
    $this->type = $type;
    $this->textRu = $textRu;
    $this->textUk = $textUk;
    $this->authorNameRu = $authorNameRu;
    $this->authorNameUk = $authorNameUk;
    $this->workUrl = $workUrl;
    $this->videoUrl = $videoUrl;
    $this->uploadedFile = $uploadedFile;
    $this->deletePicture = $deletePicture;
  }

  /**
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @return string|null
   */
  public function getTextRu(): ?string {
    return $this->textRu;
  }

  /**
   * @return string|null
   */
  public function getTextUk(): ?string {
    return $this->textUk;
  }

  /**
   * @return string|null
   */
  public function getAuthorNameRu(): ?string {
    return $this->authorNameRu;
  }

  /**
   * @return string|null
   */
  public function getAuthorNameUk(): ?string {
    return $this->authorNameUk;
  }

  /**
   * @return string|null
   */
  public function getWorkUrl(): ?string {
    return $this->workUrl;
  }

  /**
   * @return string|null
   */
  public function getVideoUrl(): ?string {
    return $this->videoUrl;
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
      'type' => $this->type,
      'title' => $this->title,
      'text_ru' => $this->textRu,
      'text_uk' => $this->textUk,
      'author_name_ru' => $this->authorNameRu,
      'author_name_uk' => $this->authorNameUk,
      'work_url' => $this->workUrl,
      'video_url' => $this->videoUrl,
    ];
  }

  /**
   * @param array $attributes
   * @return ReviewDto
   */
  public static function createFromArray(array $attributes): self {
    return new self(
      (int)ArrayHelper::getNotEmptyValue($attributes, 'type', ReviewsType::TEXT_REVIEWS),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'title', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'text_ru', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'text_uk', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'author_name_ru', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'author_name_uk', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'work_url', ''),
      (string)ArrayHelper::getNotEmptyValue($attributes, 'video_url', ''),
      ArrayHelper::getNotEmptyValue($attributes, 'file', '') ?: null,
      (int)ArrayHelper::getNotEmptyValue($attributes, 'deletePicture', 0) ?: null
    );
  }
}