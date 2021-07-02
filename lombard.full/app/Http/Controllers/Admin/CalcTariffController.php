<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcCategory;
use App\Models\Common\Calculator\CalcHallmark;
use App\Models\Common\Calculator\CalcMaxAmount;
use App\Models\Common\Calculator\CalcPrice;
use App\Models\Common\Calculator\CalcRate;
use App\Models\Common\Calculator\CalcStatus;
use App\Models\Common\Calculator\CalcTariff;
use App\Models\Common\Calculator\CalcTerm;
use App\Models\Common\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcTariffController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 15;
        $page = $request->has('page') ? $request->page * $paginate - $paginate : 0;
        $tariffs = CalcTariff::paginate($paginate);

        return view('admin.calculator.calc_tariffs.index', compact('tariffs', 'page'));
    }
    public function edit($id)
    {

        $tariff = CalcTariff::with(['terms'])->find($id);

        $offices = Office::with('tarif')->get();
//        return $tariff;
        $categories = CalcCategory::all();

        return view('admin.calculator.calc_tariffs.edit', compact('tariff', 'categories','offices'));

    }

    public function getTariff($id)
    {
        return CalcTariff::with(['hallmarks', 'category', 'terms', 'maxAmounts', 'prices', 'rates'])->find($id);
    }
    public function create()
    {
        $categories = CalcCategory::all();
        $offices = Office::with('tarif')->get();
        return view('admin.calculator.calc_tariffs.create', compact( 'categories', 'offices'));
    }

    public function store(Request $request)
    {
            $tariff = CalcTariff::create($request->only('title_ru', 'title_uk', 'related_office', 'published'));
            $this->fillCalcTariff($request, $tariff);

            return redirect()->route('calc_tariffs.index')
                   ->with(['message' => 'Тариф создан', 'class' => 'success']);
    }

     public function update(Request $request, CalcTariff $tariff)
{
        $tariff->update($request->only('title_ru', 'title_uk', 'related_office', 'published'));
        $tariff->terms()->delete();
        $this->fillCalcTariff($request, $tariff);

        return redirect()->route('calc_tariffs.edit', ['id' => $tariff->id])
            ->with(['message' => 'Тариф обновлен', 'class' => 'success']);
    }

    private function fillCalcTariff($request, $tariff)
    {

        if($request->get('term'))
        {
            foreach ($request->get('term') as $key => $term){
                $category = $key;
                foreach ($term as $index => $value){

                    $termValue = explode(' - ', $index);

                    CalcTerm::firstOrCreate([
                        'calc_tariff_id' => $tariff->id,
                        'calc_category_id' => $category,
                        'from' => $termValue[0],
                        'to' => $termValue[1],
                        'value'=>$value[0]
                    ]);
                }
            }
        }

    }
    public function destroyAll(Request $request)
    {
        if($request->calc_tariffs && count($request->calc_tariffs)){

            CalcTariff::destroy($request->calc_tariffs);

            return redirect()->route('calc_tariffs.index')
                ->with(['message' => 'Тарифы удалены', 'class' => 'success']);
        } else {
                return back()->with(['message' => 'Не выбрано ни одного тарифа', 'class' => 'warning']);
        }

    }
    public function destroy( CalcTariff $tariff ) {

            if ($tariff->delete()){
                    return response()->json( [
                            "class" => "success", "message" => 'Тариф удален'
                            ] );
        }
    }

    public function moveDown($id)
    {
            $tariff = CalcTariff::findOrFail($id);

            if ($tariff->down()) {

                    return back()
                            ->with(['message' => 'Тариф перемещен', 'class' => 'success']);
        }

        return back()
                    ->with(['message' => 'упс, что-то не подвигается.', 'class' => 'danger']);
    }

    public function moveUp($id)
    {
            $tariff = CalcTariff::findOrFail($id);

            if ($tariff->up()) {

                    return back()
                            ->with(['message' => 'Тариф перемещен', 'class' => 'success']);
        }

        return back()
                    ->with(['message' => 'упс, что-то не подвигается.', 'class' => 'danger']);
    }
}
