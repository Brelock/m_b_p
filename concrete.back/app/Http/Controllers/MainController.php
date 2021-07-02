<?php

namespace App\Http\Controllers;

use App\Enums\CategoryTypes;
use App\Models\Category;
use App\Models\Setting;

class MainController extends Controller {
	public function index() {
		$setting = Setting::query()->first();
		$categorySlab = Category::query()->whereType(CategoryTypes::SLAB)->with('pictures')->first();
		$categoryWall = Category::query()->whereType(CategoryTypes::WALL)->first();
		$categoryColumn = Category::query()->whereType(CategoryTypes::COLUMN)->first();
		return view('main.index', compact('setting', 'categorySlab', 'categoryWall', 'categoryColumn'));
	}
}
