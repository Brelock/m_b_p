<?php

namespace App\Http\Controllers\Site;

use App\Models\Admin\Promo;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class PromoController extends Controller
{
    /**
     * @param $promo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($promo)
    {
        $promo = Promo::whereAlias($promo)->firstOrFail();

        $promos = Promo::where('alias', '!=', $promo->alias)->take(3)->get();

        return view('site.promo.index', compact('promo', 'promos'));

    }


}
