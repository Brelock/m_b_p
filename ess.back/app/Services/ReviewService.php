<?php

namespace App\Services;

use App\DTO\ReviewDto;
use App\Helpers\FileHelper;
use App\Models\Review;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Http\UploadedFile;

class ReviewService {
  use PromiseActionsTrait;
  /**
   * @var Review
   */
  private $review;

  /**
   * ReviewItemService constructor.
   *
   * @param Review $review
   */
  public function __construct(Review $review) {
    $this->review = $review;
  }

  /**
   * @return Review
   */
  public function getReview() {
    return $this->review;
  }

  /**
   * @param ReviewDto $reviewDto
   * @return ReviewService
   */
  public function changeAttributes(ReviewDto $reviewDto): self {
    $this->review->fill($reviewDto->toArray());
    return $this;
  }

  /**
   * @param UploadedFile $file
   * @return ReviewService
   */
  public function uploadNewFile(UploadedFile $file): self {
    $newFileName = FileHelper::generateNewName($file->clientExtension());
    if ($file->storeAs("public/" . $this->review->directoryStorage(), $newFileName)){
      $this->resetFile($newFileName);
    }

    return $this;
  }

  /**
   * @param string $fileName
   * @return ReviewService
   */
  public function resetFile(string $fileName): self {
    if ($this->review->picture_file_name)
      $this->deletePicture();

    $this->review->picture_file_name = $fileName;

    return $this;
  }

  /**
   * @return ReviewService
   */
  public function deletePicture(): self {
    if ($this->review->deleteFile($this->review->picture_file_name))
      $this->review->picture_file_name = null;

    return $this;
  }

  /**
   * @return ReviewService
   */
  public function commitChanges(): self {
    $this->review->save();

    $this->releasePromiseActions();

    return $this;
  }
}