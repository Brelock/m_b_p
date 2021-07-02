<?php

namespace App\Services;

use App\DTO\CategoryDto;
use App\Models\Category;
use App\Models\CategoryPicture;
use App\Services\Helpers\PromiseActionsTrait;
use Illuminate\Http\UploadedFile;

class CategoryService {
  use PromiseActionsTrait;

  /**
   * @var Category
   */
  private $category;

  /**
   * CategoryItemService constructor.
   *
   * @param Category $category
   */
  public function __construct(Category $category) {
    $this->category = $category;
  }

  /**
   * @return Category
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * @param CategoryDto $categoryDto
   * @return CategoryService
   */
  public function changeAttributes(CategoryDto $categoryDto): self {
    $this->category->fill($categoryDto->toArray());
    return $this;
  }
  /**
   * @return CategoryService
   */
  public function commitChanges(): self {
    $this->category->save();

    $this->releasePromiseActions();

    return $this;
  }

	/**
	 * @param UploadedFile[]|array $files
	 * @return void
	 */
  public function uploadFiles(array $files) {
	  $this->recordPromiseAction(function() use($files) {
		  foreach($files as $typeNumber => $uploadedImage) {
		  	/* @var UploadedFile $uploadedImage */
			  $newPicture = new CategoryPicture();
			  $pictureService = new PictureService($uploadedImage);

			  $newPicture->file_name = $pictureService->storeToFolder($newPicture->directoryStorage());
			  $newPicture->type = $typeNumber;

			  $this->category->pictures()->save($newPicture);
		  }
	  });
  }

	/**
	 * @param array $typesToDelete
	 */
	public function deleteFiles(array $typesToDelete) {
		$this->recordPromiseAction(function() use($typesToDelete) {
			$deletingFiles = $this->category->pictures()
				->whereIn('type', $typesToDelete)
				->get();

			$deletingFiles->each(function($picture) {
				/* @var CategoryPicture $picture */
				$picture->deleteFile($picture->file_name);
				$picture->delete();
			});
		});
	}
}