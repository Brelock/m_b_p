<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcCategory;
use App\Models\Common\Calculator\CalcHallmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcHallmarkController extends Controller
{
    public function index()
    {
        $hallmark = CalcHallmark::get();
        return view('admin.calculator.calc_hallmark.index', compact( 'hallmark'));
    }
    public function save(Request $request)
    {
        CalcHallmark::truncate();
        if($request->get('hallmarks'))
        {
            foreach ($request->get('hallmarks') as $key => $hallmark)
            {
                if($key == 'gold') $calc_category_id = 1;
                if($key == 'silver') $calc_category_id = 2;
                foreach ($hallmark as $keyHall => $hall) {
                    CalcHallmark::create([
                        'calc_category_id' => $calc_category_id,
                        'hallmark' => $hall['hallmark'],
                        'lom' => $hall['lom'],
                        'zalog' => $hall['zalog']]);
                }
            }
        }


        return redirect()->route('calc_hallmarks')
            ->with(['message' => 'Пробы обновлены', 'class' => 'success']);
    }

//    public function getHallmarks(CalcCategory $category)
//    {
//        $hallmarks = $category->hallmarks;
//        return $hallmarks;
//    }

    public function getHallmarks(Request $request)
    {
        if (is_array($request->get('id'))) {
            return CalcHallmark::whereIn('calc_category_id', $request->get('id'))->get();
        } else {
            return CalcHallmark::where('calc_category_id', $request->get('id'))->get();
        }
    }

    public function destroy(CalcHallmark $calcHallmark)
    {
        $calcHallmark->delete();

        if (request()->expectsJson()){
            return response([
                "class" => "success", "message" => 'Проба удалена.'
            ]);
        } else {
            return response([
                "class" => "error", "message" => 'При удалении пробы произошла ошибка'
            ]);
        }

    }
}
