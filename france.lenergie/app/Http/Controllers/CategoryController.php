<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @param Category $category
     * @return View
     */
    public function index(Category $category): View
    {
        return view('categories.index',['categories' => $category->all()]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function store(Request $request, Category $category): RedirectResponse
    {
        $category->create(array_merge($request->all(), ['slug' => Str::slug($request->name)]));
        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('categories.show', ['category' => $category]);
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->update(array_merge($request->all(), ['slug' => Str::slug($request->name)]));
        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
