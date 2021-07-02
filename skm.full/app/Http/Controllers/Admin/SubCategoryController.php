<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Resources\CategoryResource;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\CategoryRequest;

class SubCategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productService, $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllSubCategories();
        $parentCategories = $this->categoryService->getParents();
        return view('admin.subcategories.index',compact('categories','parentCategories'));
    }

    public function show(Category $category)
    {
        $category->load('products');
        $categories = $this->categoryService->getAll();

        return view('site.categories.index')->with(['category' => $category, 'categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->description = $request->description ?: null;
        $category->slug = $request->slug ?: \Str::slug($request->title);
        $category->status = $request->status ? 1 : 0;
        $category->save();
        if($request->has('image')){
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.subcategories.index');
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'title' => $request->title,
            'description' => $request->description ?: null,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug ?: \Str::slug($request->title),
            'status' => $request->status ? 1 : 0
        ]);

        if($request->has('image')){
            $category->clearMediaCollection('images');
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.subcategories.index');
    }

    public function destroy(Request $request, Category $category)
    {
        if($category->products->count() != 0){
            \Session::flash('message', "В этой категории есть продукты");
            return redirect()->back();
        }

        $category->delete();

        return redirect()->back();
    }
}
