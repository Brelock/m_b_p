<?php

namespace App\Http\Controllers\Site;

use App\Filters\VacancyFilters;
use App\Http\Requests\ClientRequest;
use App\Models\Admin\Page;
use App\Models\Admin\City;
use App\Models\Common\Seo;
use App\Models\Common\Vacancy;
use App\Http\Controllers\Controller;
use App\Models\Common\VacancyCategory;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Request;

class VacancyController extends Controller
{
    public function index(VacancyFilters $filters, Request $request)
    {
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
            ['citiesArray' => $citiesArray, 'vacancies' => $vacancies, 'cities' => $cities, 'categories' => $categories, 'request' => $request, 'static_part' => $static_part]);
    }

    protected function getVacancies(VacancyFilters $filters)
    {
        if ($filters->getFilters()) {
            $news = Vacancy::filter($filters)->orderBy('created_at', 'DESC');
        } else {
            $news = Vacancy::published()->orderBy('created_at', 'DESC');
        }
        return $news->paginate(10);
    }
}
