<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	/**
	 * @return View
	 */
	public function index(): View {
		return view('categories.index');
	}

	/**
	 * @param Category $category
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(Category $category): View {
		return view('categories.show', ['category' => $category]);
	}
}
