<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Category;
use App\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\ShopService;
use App\Services\SlideService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productService, $categoryService, $slideService, $shopService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService,
                                SlideService $slideService,
                                ShopService $shopService
    )
    {
        $this->shopService = $shopService;
        $this->slideService = $slideService;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $shops = $this->shopService->getAllActive();
        $slides = $this->slideService->getAllActive();
        $brand = Brands::first();
        $categories = $this->categoryService->getParents();
        $popularProducts = $this->productService->getPopular();
        $newestProducts = $this->productService->getNewest() ?? [];
        return view('site.main.index')->with([
            'shops' => $shops,
            'slides' => $slides,
            'brands' => $brand,
            'popularProducts' => $popularProducts,
            'newestProducts' => $newestProducts,
            'categories' => $categories, 'brand' => $brand
        ]);
    }
}
