<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoryResource;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\ShopService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productService, $categoryService, $shopService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService,
                                ShopService $shopService
    )
    {
        $this->shopService = $shopService;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        //return Category::paginate();
    }

    public function show(Category $category, Category $subcategory = null)
    {
        $shops = $this->shopService->getAllActive();
        $products = $this->productService->getByCateries( $category,  $subcategory);
        $categories = $this->categoryService->getParents();

        return view('site.categories.index')->with([
            'shops' => $shops,
            'category' => $category,
            'categories' => $categories,
            'products' => $products
        ]);
    }

    /*public function store(Request $request)
    {
        return new CategoryResource(Category::create($request->all()));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return new CategoryResource($category);
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return response()->noContent();
    }*/
}
