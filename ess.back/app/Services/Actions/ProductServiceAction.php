<?php

namespace App\Services\Actions;


use App\DTO\ProductDto;
use App\Models\Product;
use App\Services\Helpers\ReorderAction;
use App\Services\ProductService;

class ProductServiceAction {
	use ReorderAction;
	/**
	 * @param ProductDto $dto
	 * @return Product
	 */
	public function createProduct(ProductDto $dto): Product {
		return $this->saveProduct(new Product(), $dto);
	}

	/**
	 * @param Product $product
	 * @param ProductDto $dto
	 * @return Product
	 */
	public function updateProduct(Product $product, ProductDto $dto): Product {
		return $this->saveProduct($product, $dto);
	}

	/**
	 * @param Product $product
	 * @param ProductDto $productDto
	 * @return Product
	 */
	protected function saveProduct(Product $product, ProductDto $productDto): Product {
		$serviceItemService = new ProductService($product);
    if ($productDto->hasFileXml())
      $serviceItemService->uploadNewFile($productDto->getUploadedFile());

    if ($productDto->hasDeleteXmlFile())
      $serviceItemService->deleteXlsFile();

		if ($productDto->hasFiles())
			$serviceItemService->uploadFiles($productDto->getFiles());

		if($productDto->hasToDeleteFiles())
			$serviceItemService->deleteFiles($productDto->getPicturesIdToDelete());

		$serviceItemService
      ->attachParams($productDto->getParams())
			->changeAttributes($productDto)
			->commitChanges();

		return $serviceItemService->getProduct();
	}

}