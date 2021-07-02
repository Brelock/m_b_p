<?php

namespace App\Services\Actions;


use App\DTO\ReviewDto;
use App\Models\Review;
use App\Services\Helpers\ReorderAction;
use App\Services\ReviewService;

class ReviewServiceAction {
  use ReorderAction;

  /**
   * @param ReviewDto $reviewDto
   * @return Review
   */
  public function createReview(ReviewDto $reviewDto): Review {
    return $this->saveReview(new Review(), $reviewDto);
  }

  /**
   * @param Review $review
   * @param ReviewDto $dto
   * @return Review
   */
  public function updateReview(Review $review, ReviewDto $dto): Review {
    return $this->saveReview($review, $dto);
  }

  /**
   * @param Review $review
   * @param ReviewDto $reviewDto
   * @return Review
   */
  public function saveReview(Review $review, ReviewDto $reviewDto): Review {
    $serviceItemService = new ReviewService($review);
    if ($reviewDto->hasFile())
      $serviceItemService->uploadNewFile($reviewDto->getUploadedFile());

    if ($reviewDto->hasDeletePicture())
      $serviceItemService->deletePicture();

    $serviceItemService
      ->changeAttributes($reviewDto)
      ->commitChanges();

    return $serviceItemService->getReview();
  }

  /**
   * @param Review $review
   * @return $this
   * @throws \Exception
   */
  public function deleteReview(Review $review){
    $serviceItemService = new ReviewService($review);
    $serviceItemService
      ->deletePicture();
    $review->delete();

    return $this;
  }
}