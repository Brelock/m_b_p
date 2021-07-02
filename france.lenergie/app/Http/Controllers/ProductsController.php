<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * @param Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $product = new Product();

        $product->create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Product $product,Request $request): RedirectResponse
    {
        $product->update(array_merge($request->all(), ['slug' => Str::slug($request->name)]));
        return redirect()->route('products.index');
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
