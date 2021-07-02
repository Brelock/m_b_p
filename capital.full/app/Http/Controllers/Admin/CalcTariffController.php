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
use App\Models\Common\Tariff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcTariffController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 15;
        $page = $request->has('page') ? $request->page * $paginate - $paginate : 0;
        $tariffs = CalcTariff::with('category')->defaultOrder()->paginate($paginate);

        return view('admin.calculator.calc_tariffs.index', compact('tariffs', 'page'));
    }

    public function edit($id)
    {
        $not_active_statuses = CalcStatus::whereDoesntHave('calcTariffs', function($query) use ($id) {
            $query->where('calc_tariff_id', $id);
        })->get();
        $tariff = CalcTariff::with(['hallmarks', 'category', 'terms', 'maxAmounts', 'prices', 'rates', 'statuses'])->find($id);
        $all_statuses = CalcStatus::all();
        $tariffs = Tariff::all();

//        return $tariff;
        $categories = CalcCategory::all();

        return view('admin.calculator.calc_tariffs.edit', compact('tariff', 'categories', 'tariffs', 'all_statuses', 'not_active_statuses'));

    }

    public function getTariff($id)
    {
        return CalcTariff::with(['hallmarks', 'category', 'terms', 'maxAmounts', 'prices', 'rates'])->find($id);
    }

    public function create()
    {
        $all_statuses = CalcStatus::all();
        $categories = CalcCategory::all();
        $tariffs = Tariff::all();

        return view('admin.calculator.calc_tariffs.create', compact( 'categories', 'tariffs', 'all_statuses'));
    }

    public function store(Request $request)
    {
        $tariff = CalcTariff::create($request->only('title_ru', 'title_uk', 'calc_category_id', 'related_tariff', 'published'));
        $tariff->statuses()->attach($request->statuses);
        $this->fillCalcTariff($request, $tariff);

        return redirect()->route('calc_tariffs.index')
            ->with(['message' => 'Тариф создан', 'class' => 'success']);
    }

    public function update(Request $request, CalcTariff $tariff)
    {
        $tariff->update($request->only('title_ru', 'title_uk', 'calc_category_id', 'related_tariff', 'published'));

        $tariff->statuses()->detach();
        $tariff->statuses()->attach($request->statuses);

        $tariff->terms()->delete();
        $tariff->hallmarks()->delete();
        $tariff->maxAmounts()->delete();

        $this->fillCalcTariff($request, $tariff);

        return redirect()->route('calc_tariffs.index')
            ->with(['message' => 'Тариф обновлен', 'class' => 'success']);
    }

    private function fillCalcTariff($request, $tariff)
    {
        if ($request->rates and count($request->rates)){

            foreach ($request->rates as $amount => $statuses){
                $newAmount = CalcMaxAmount::create([
                    'calc_tariff_id' => $tariff->id,
                    'value' => $amount
                ]);
                foreach ($statuses as $status => $terms){

                    foreach ($terms as $term => $rate){

                        $term = explode(' - ', $term);

                        $newTerm = CalcTerm::firstOrCreate([
                            'calc_tariff_id' => $tariff->id,
                            'from' => $term[0],
                            'to' => $term[1]
                        ]);
                        CalcRate::create([
                            'calc_tariff_id' => $tariff->id,
                            'calc_max_amount_id' => $newAmount->id,
                            'calc_status_id' => $status,
                            'calc_term_id' => $newTerm->id,
                            'value' => $rate[0],
                        ]);
                    }

                }

            }
        }

        if ($request->prices and count($request->prices)){
            foreach ($request->prices as $hallmark => $statuses){
                $newHallmark = CalcHallmark::create([
                    'calc_category_id' => $tariff->calc_category_id,
                    'calc_tariff_id' => $tariff->id,
                    'hallmark' => $hallmark
                ]);
                foreach ($statuses as $status => $price){

                    CalcPrice::create([
                        'calc_tariff_id' => $tariff->id,
                        'calc_status_id' => $status,
                        'calc_hallmark_id' => $newHallmark->id,
                        'value' => $price[0]
                    ]);
                }

            }
        }
        return $tariff;
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
