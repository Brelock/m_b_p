<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcSpecialAbilityController extends Controller
{
    public function index ()
    {
        $type = null;
        $types = ['antiques', 'watch', 'diamond', 'jewelry'];
        if (\request()->has('type') && in_array(\request('type'), $types) ){
            $type = request('type');
        }

//        return view('site.calculator.special_abilities', ['type' => $type]);
        return view('site.calculator.special_abilities', compact('type'));
    }
}
