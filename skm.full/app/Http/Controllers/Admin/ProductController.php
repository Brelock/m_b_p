<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\ProductResource;
use App\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\ProductRequest;


class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productService, $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        $products->load('category');

        return view('admin.products.index')->with('products', $products);
    }

    /*public function show(Product $product)
    {
        $products = $this->productService->getPopular();
        $product->load('category');

        return view('site.products.index')->with(['product' => $product, 'products' => $products]);
    }*/

    public function create()
    {
        //$categories = $this->categoryService->getAll()->pluck('title', 'id');
        $categories = $this->categoryService->getParents();
        //dd($categories);
        return view('admin.products.create')->with('categories', $categories);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->description = $request->description ?: null;
        $product->slug = $request->slug ?: \Str::slug($request->title);
        $product->price = $request->price;
        $product->new = $request->new ? 1 : 0;
        $product->popular = $request->popular ? 1 : 0;
        $product->status = $request->status ? 1 : 0;
        $product->save();

        $this->updateMediaCollection($product, 'main_image', $request->input('photo', []));
        $this->updateMediaCollection($product, 'images', $request->input('photo-collection', []));

        return redirect()->route('admin.products.index');
    }

    private function updateMediaCollection($model, $collectionName, $requestFilenames)
    {
        if (count($model->getMedia($collectionName)) > 0) {
            foreach ($model->getMedia($collectionName) as $media) {
                if (!in_array($media->file_name, $requestFilenames)) {
                    $media->delete();
                }
            }
        }

        $media = $model->getMedia($collectionName)->pluck('file_name')->toArray();

        foreach ($requestFilenames as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection($collectionName);
            }
        }
    }

    public function edit(Product $product)
    {
        //$categories = $this->categoryService->getAll()->pluck('title', 'id');
        $categories = $this->categoryService->getParents();
        $product->load('category');
        return view('admin.products.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description ?: null,
            'slug' => $request->slug ?: \Str::slug($request->title),
            'price' => $request->price,
            'new' => $request->new ? 1 : 0,
            'popular' => $request->popular ? 1 : 0,
            'status' => $request->status ? 1 : 0
        ]);

        $this->updateMediaCollection($product, 'main_image', $request->input('photo', []));
        $this->updateMediaCollection($product, 'images', $request->input('photo-collection', []));


        return redirect()->route('admin.products.index');
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
