<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PictureReorderRecordFormRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ReorderRecordFormRequest;
use App\Models\Product;
use App\Models\ProductPicture;
use App\Services\Actions\ProductServiceAction;
use Illuminate\View\View;

class ProductController extends Controller {
	/**
	 * @var ProductServiceAction
	 */
	protected $service;

	/**
	 * ProductController constructor.
	 *
	 * @param ProductServiceAction $service
	 */
	public function __construct(ProductServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * GetDisplay a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View {
    $products = Product::query()->with('pictures')->orderBy('display_order')->get();
		return view('admin.products.index', ['products' => $products]);
	}

	/**
	 * @return View
	 */
	public function create(): View {
		return view('admin.products.edit', ['product' => new Product()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ProductRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function store(ProductRequest $request) {
		$this->service->createProduct($request->createDto());

		return redirect()
			->route('admin.products.index')
			->with(['message' => 'Продукт сохранен.', 'class' => 'success']);
	}

	/**
	 * @param Product $product
	 * @return View
	 */
	public function edit(Product $product): View {
		return view('admin.products.edit', ['product' => $product]);
	}

	/**
	 * Update the specified resource in storage
	 *
	 * @param ProductRequest $request
	 * @param Product $product
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function update(ProductRequest $request, Product $product) {
		$this->service->updateProduct($product, $request->createDto());
		return redirect()
			->route('admin.products.index')
			->with(['message' => 'Продукт изменен.', 'class' => 'success']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Product $product
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(Product $product) {
    $product->delete();
		return redirect()
			->route('admin.products.index')
			->with(['message' => 'Продукт успешно удален.', 'class' => 'deleted']);

	}

	/**
	 * Restore the specified resource in storage.
	 *
	 * @param Product $restoreProduct
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function restore(Product $restoreProduct) {
    $restoreProduct->restore();
		return response()->json([
			'status' => 'restored',
			'message' => 'Продукт успешно восстановлен.'
			]);
	}

	/**
	 * Move the specified agency to desired position.
	 *
	 * @param ReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorder(ReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), Product::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Продукт не найден'], 404);
	}

	/**
	 * Move the specified agency to desired position.
	 *
	 * @param PictureReorderRecordFormRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reorderPictures(PictureReorderRecordFormRequest $request) {
		if ($this->service->reorder((int)$request->json('currentId'), (int)$request->json('desiredId'), ProductPicture::class)) {
			return response()->json(['status' => 'reorder']);
		}

		return response()->json(['error' => 'Продукт не найден'], 404);
	}

}
