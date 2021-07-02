<?php

namespace App\Http\Controllers\Site;

use App\Models\Common\Seo;
use App\Models\Site\TariffCategory;
use App\Http\Controllers\Controller;

class TariffCategoryController extends Controller
{
    public function index()
    {
        $meta_tags = Seo::whereAlias('tariff')->first();
        $categories = TariffCategory::with(['tariffs' => function ($query) {
          $query->where('published', '=', 1);
          }])->get();

        return view('site.tariffs.index', compact('categories', 'meta_tags'));
    }

}
