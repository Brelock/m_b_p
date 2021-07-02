<?php

namespace App\Services\Actions;

use App\DTO\ProductDto;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;

class ProductServiceAction {
  /**
   * @param int|null $id
   * @return Category|null
   */
  protected function fetchCategory(?int $id) : ?Category {
    if($id)
      return Category::query()->find($id);

    return null;
  }

	/**
	 * @param Product $product
	 * @param ProductDto $productDto
	 * @return Product
	 * @throws \Exception
	 */
	protected function saveProduct(Product $product, ProductDto $productDto): Product {
		$productItemService = new ProductService($product);

		if ($productDto->hasPictures()) {
			$productItemService->addPictures($productDto->getPictures());
		}

		$productItemService
			->changeAttributes($productDto)
			->attachOrDetachCategory($this->fetchCategory($productDto->getCategoryId()))
			->commitChanges()
			->attachParams($productDto->getParams());

		return $productItemService->getProduct();
	}

	/**
	 * @param ProductDto $productDto
	 * @return Product
	 * @throws \Exception
	 */
	public function createProduct(ProductDto $productDto): Product {
		return $this->saveProduct(new Product(), $productDto);
	}

	/**
	 * @param Product $product
	 * @param ProductDto $productDto
	 * @return Product
	 * @throws \Exception
	 */
	public function updateProduct(Product $product, ProductDto $productDto): Product {
		return $this->saveProduct($product, $productDto);
	}
}
