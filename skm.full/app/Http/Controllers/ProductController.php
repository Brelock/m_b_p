<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Resources\ProductResource;
use App\Product;
use App\Services\ProductService;
use App\Services\ShopService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productService, $categoryService, $shopService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService,
                                ShopService $shopService)
    {
        $this->shopService = $shopService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        //return view('site.products.index');
    }

    public function show(Product $product)
    {
        $categories = $this->categoryService->getParents();
        $shops = $this->shopService->getAllActive();
        $products = $this->productService->getPopular();
        $product->load('category');

        return view('site.products.index')->with([
            'categories' => $categories,
            'product' => $product,
            'products' => $products,
            'shops' => $shops
        ]);
    }

    public function store(Request $request)
    {
        return new ProductResource(Product::create($request->all()));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
