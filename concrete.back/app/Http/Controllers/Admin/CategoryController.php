<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryPictureTypes;
use App\Enums\CategoryTypes;
use App\Http\Controllers\Controller;
use App\Services\Actions\CategoryServiceAction;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use Illuminate\View\View;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller {
	/**
	 * @var CategoryServiceAction
	 */
	protected $service;

	/**
	 * CategoryController constructor.
	 *
	 * @param CategoryServiceAction $service
	 */
	public function __construct(CategoryServiceAction $service) {
		$this->service = $service;
	}

	/**
	 * @return View
	 */
	public function index(): View {
		$categories = Category::query()->get();
		return view('admin.categories.index', [
			'categories' => $categories,
		]);
	}

	/**
	 * @param Category $category
	 * @return View
	 */
	public function edit(Category $category): View {
		$pictures = $category->pictures;
		$labelsType = CategoryTypes::$LABELS;
		$typePictures = CategoryTypes::$TYPES_PICTURES;
		$picturesType = CategoryPictureTypes::$LABELS;

		return view('admin.categories.edit', [
			'category' => $category,
			'labelsType' => $labelsType,
			'typePictures' => $typePictures,
			'picturesType' => $picturesType,
			'pictures' => $pictures
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Category $category
	 * @param CategoryRequest $request
	 * @return RedirectResponse
	 */
	public function update(Category $category, CategoryRequest $request) {
		$this->service->updateCategory($category, $request->createDto());

		return redirect()->route('categories')->with('success', 'Category updated!');
	}
}
