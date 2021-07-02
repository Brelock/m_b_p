<?php

namespace App\Http\Controllers\Site;

use App\Models\Admin\News;
use App\Models\Admin\Region;
use App\Models\Common\City;
use App\Models\Common\Seo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $current_region = null;

        $meta_tags = Seo::whereAlias('news')->first();


        $news = News::published()->latest();
        $current_national = $request->has('national') ? 1 : null;

        $regions = Region::published()->get();
        $request = $request->all();
        $news = $news->paginate(12);

        return view('site.news.news-front',
            compact('news', 'request', 'regions', 'current_region', 'current_national', 'meta_tags'));
    }

    public function show($news)
    {
        $news = News::whereAlias($news)->firstOrFail();
        $moreNews = News::orderBy(DB::raw('RAND()'))->take(3)->whereNotIn('id', [$news->id])->get();

        return view('site.news.show-item-news-front', compact('news','moreNews'));

    }
}
