<?php

namespace App\Services;


use App\DTO\ProductDto;
use App\Helpers\FileHelper;
use App\Models\Product;
use App\Models\ProductParam;
use App\Models\ProductPicture;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class ProductService {
  use PromiseActionsTrait;

  /**
   * @var Product
   */
  private $product;

  /**
   * ProductService constructor.
   *
   * @param Product $product
   */
  public function __construct(Product $product) {
    $this->product = $product;
  }

  /**
   * @return Product
   */
  public function getProduct() {
    return $this->product;
  }

  /**
   * @param ProductDto $productDto
   * @return $this
   */
  public function changeAttributes(ProductDto $productDto): self {
    $this->product->fill($productDto->toArray());
    return $this;
  }

  /**
   * @param UploadedFile[]|array $files
   * @return ProductService
   */
  public function uploadFiles(array $files): self {
    $this->recordPromiseAction(function () use ($files) {
      foreach ($files as $file) {
        $newPicture = new ProductPicture();
        /* @var UploadedFile $uploadedImage */
        $uploadedImage = $file;
        $pictureService = new PictureService($uploadedImage);
        $newFileName = $pictureService->storeToFolder($newPicture->directoryStorage());
        if (!empty($newFileName)) {
          $newPicture->picture_name = $newFileName;
          $newThumbFileName = "thumb_" . $newFileName;

          if ($pictureService->createThumbnail($newPicture->assetRelative($newFileName), $newPicture->assetRelative($newThumbFileName))) {
            $newPicture->thumb_name = $newThumbFileName;
          }

          $this->product->pictures()->save($newPicture);

        }
      }
    });
    return $this;
  }

  /**
   * @param array $picturesIdToDelete
   * @return ProductService
   */
  public function deleteFiles(array $picturesIdToDelete): self {
    $this->recordPromiseAction(function () use ($picturesIdToDelete) {
      /* @var Collection|ProductPicture[] $deletingPictures */
      $deletingPictures = $this->product->pictures()
        ->whereIn('id', $picturesIdToDelete)
        ->get();

      $deletingPictures->each(function ($picture) {
        /* @var ProductPicture $picture */
        $this->deletePictureThumb($picture);
      });
    });
    return $this;
  }

  /**
   * @param ProductPicture $picture
   * @return bool|null
   * @throws \Exception
   */
  public function deletePictureThumb(ProductPicture $picture) {
    $picture->deleteFile($picture->picture_name);
    $picture->deleteFile($picture->thumb_name);
    return $picture->delete();
  }

  /**
   * @param UploadedFile $file
   * @return ProductService
   */
  public function uploadNewFile(UploadedFile $file): self {
    $newFileName = FileHelper::generateNewName($file->clientExtension());
    if ($file->storeAs("public/" . $this->product->directoryStorage(), $newFileName))
      $this->resetFile($newFileName);

    return $this;
  }

  /**
   * @param string $fileName
   * @return ProductService
   */
  public function resetFile(string $fileName): self {
    if ($this->product->xls_file_name)
      $this->deleteXlsFile();
    $this->product->xls_file_name = $fileName;

    return $this;
  }

  /**
   * @return ProductService
   */
  public function deleteXlsFile(): self {
    if ($this->product->deleteFile($this->product->xls_file_name))
      $this->product->xls_file_name = null;

    return $this;
  }

	/**
	 * @param array $params
	 * @return $this
	 */
  public function attachParams(array $params) {
    if(!empty($params)){
      $params = $this->prepareParamsForAttach($params);
    }
  	$this->recordPromiseAction(function() use($params) {
  		$this->product->params()->each(function($oldParam) {
  			/** @var ProductParam $oldParam */
			  $oldParam->delete();
		  });
		  foreach($params as $param) {
		  	$newParam = new ProductParam();
		  	$newParam->fill($param);
			  $this->product->params()->save($newParam);
		  }
	  });
  	return $this;
  }

	/**
	 * @param array $rowParams
	 * @return array
	 */
  public function prepareParamsForAttach(array $rowParams) {
  	$prepareParams = [];
  	for ($i = 0; $i < count($rowParams['title_ru']); $i++) {
  		$paramsItem = [];
  		$paramsItem['title_ru'] = $rowParams['title_ru'][$i];
  		$paramsItem['title_uk'] = $rowParams['title_uk'][$i];
  		$paramsItem['value_ru'] = $rowParams['value_ru'][$i];
  		$paramsItem['value_uk'] = $rowParams['value_uk'][$i];
		  $prepareParams[$i] = $paramsItem;
	  }
  	return $prepareParams;
  }

  /**
   * @return ProductService
   */
  public function commitChanges(): self {
    $this->product->save();

    $this->releasePromiseActions();

    return $this;
  }
}