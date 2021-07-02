<?php

namespace App\Jobs;

use App\Enums\DirectoriesStorage;
use App\Import\Collection\OfferPictureCollection;
use App\Import\Collection\UploadedOfferPictureCollection;
use App\Import\Entity\Offer;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadOfferPictures implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var Product
   */
  protected $product;

  /**
   * @var Offer
   */
  protected $offer;

  /**
   * @var int
   */
  public $tries = 3;

  /**
   * The number of seconds to wait before retrying the job.
   *
   * @var int
   */
  public $retryAfter = 600;

  /**
   * UploadOfferPictures constructor.
   *
   * @param Product $product
   * @param Offer $offer
   */
  public function __construct(Product $product, Offer $offer) {
    $this->product = $product;
    $this->offer = $offer;
  }

  /**
   * Execute the job.
   *
   * @return void
   *
   * @throws \Exception
   */
  public function handle() {
    $service = new ProductService($this->product);

    $newPictures = $this->retrieveNewPictures($this->product, $this->offer);
    $uploadedNewPictures = $this->uploadNewPictures($newPictures);

    $service
      ->addPictures($uploadedNewPictures)
      ->deletePictures($this->detectPicturesIdsToDeletes($this->product, $this->offer))
      ->setOrderingPictures($this->offer->getPictures());

    $service->commitChanges();

    if ($newPictures->count() > $uploadedNewPictures->count())
      throw new \Exception('Pictures is not uploaded.');
  }

  /**
   * @param Product $product
   * @param Offer $offer
   *
   * @return OfferPictureCollection
   */
  protected function retrieveNewPictures(Product $product, Offer $offer): OfferPictureCollection {
    return $offer
      ->getPictures()
      ->keyByPictureIdsWithExtension()
      ->diffKeys($product->pictures->keyByFileName());
  }

  /**
   * @param OfferPictureCollection $newPictures
   *
   * @return UploadedOfferPictureCollection
   */
  protected function uploadNewPictures(OfferPictureCollection $newPictures): UploadedOfferPictureCollection {
    return $newPictures->uploadToFolder(DirectoriesStorage::PRODUCT_PICTURE_PATH);
  }

  /**
   * @param Product $product
   * @param Offer $offer
   *
   * @return array
   */
  protected function detectPicturesIdsToDeletes(Product $product, Offer $offer): array {
    return $product->pictures
      ->keyByFileName()
      ->diffKeys($offer->getPictures()->keyByPictureIdsWithExtension())
      ->getIds();
  }
}