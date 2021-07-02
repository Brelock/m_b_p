<?php

namespace App\Http\Controllers\Site;

use App\Models\Admin\CreditStep;
use App\Models\Admin\Main\Youget;
use App\Models\Admin\Page;
use App\Models\Common\Achievement;
use App\Models\Common\Faq;
use App\Models\Common\FaqCategory;
use Illuminate\Http\Request;
use App\Models\Common\Callback;
use App\Http\Controllers\Controller;

use App\Models\Common\VacancyCategory;
use App\Models\Admin\City;
use App\Models\Common\Seo;
use App\Models\Common\Vacancy;

use Illuminate\Support\Facades\Storage;
use App\Models\Common\Document;
class PageController extends Controller
{
    public function show($page, Request $request)
    {
        $pages = Page::pluck('alias')->all();

        if (!in_array($page, $pages)){
//            return redirect()->route('404');
            return redirect()->route('404');
        }
        $view = $page;
//        if ($view == 'about'){
//            $yougets = Youget::all();
//            $achievements = Achievement::first();
//            $page = Page::where('alias', $page)->with(['images' => function($query) {
//                $query->take(5);
//            }])->first();
//            return view('site.pages.'.$view, compact('page','achievements', 'yougets'));
//        } else {
//            $page = Page::where('alias', $page)->first();
//        }
        switch ($view) {
            case 'about':
                $yougets = Youget::all();
                $achievements = Achievement::first();
                $page = Page::where('alias', $page)->first();
                $faq = Faq::get();
                $callback = Callback::latest()->take(10)->get();
                return view('site.about.about-front', compact('page','achievements','faq','callback','yougets'));
                break;
            case 'requisites':
                $page = Page::where('alias', $page)->first();
                $documents = Document::get();
                return view('site.requisite.requisite-front', compact('page','documents'));
                break;
            case 'сareer':
                $page = Page::where('alias', $page)->first();
                $url = "https://api.rabota.ua/companies/3358929/published-vacancies";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                $response = curl_exec($ch);

//        $client = new Client(['headers' => ['User-Agent' => null]]);
//        $response = $client->request('GET', 'https://api.rabota.ua/companies/775048/published-vacancies');

                $vacancies = json_decode($response)->filteredVacancies;

                $vacanciesCityIds = [];

                foreach ($vacancies as $vacancy){
                    $collection = collect((array)$vacancy)->toArray();
                    $vacanciesCityIds[] = $collection['cityId'];
                }

//        $client = new Client();
//        $response = $client->request('GET', 'https://api.rabota.ua/dictionary/city');

                $url = "https://api.rabota.ua/dictionary/city";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                $response = curl_exec($ch);

                $citiesArray = [];

                foreach (json_decode($response) as $city){
                    $collection = collect((array)$city)->toArray();
                    $citiesArray[$collection['id']] = $collection['ua'];
                }

                $citiesArray = array_filter($citiesArray, function($item) use ($vacanciesCityIds) {
                    return in_array($item, $vacanciesCityIds);
                }, ARRAY_FILTER_USE_KEY);

                if ($request->has('city') && array_key_exists($request->city, $citiesArray)){
                    $cityId = $request->city;
                    $vacancies = array_filter($vacancies, function($item) use ($cityId) {
                        return $item->cityId == $cityId;
                    });
                }

                $static_part = Page::where('alias', 'vacancies')->first();
//        $meta_tags = Seo::whereAlias('vacancy')->first();
                $cities     = City::published()->get();
                $categories = VacancyCategory::published()->get();
                $request    = $request->only('city');
//        $vacancies  = $this->getVacancies($filters);
                return view('site.career.career-front',
                    ['citiesArray' => $citiesArray, 'vacancies' => $vacancies, 'cities' => $cities, 'categories' => $categories, 'request' => $request, 'static_part' => $static_part, 'page' => $page]);
                break;
        }
        $page = Page::where('alias', $page)->first();

        return view('site.pages.'.$view, compact('page', 'steps'));
    }
    public function downloadFile()
    {
        $filePath = urldecode(request('document'));
        if (\request()->has('document') && Storage::disk('documents')->exists($filePath)){
            return response()->download(storage_path() . '/app/documents/'. $filePath);
        }
        return back();
    }
}

