<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcSpecialRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcSpecialRequestController extends Controller
{
    private $paginate = 20;

    public function index(Request $request)
    {
        Carbon::setLocale('ru');
        $page = $request->has('page') ? $request->page*$this->paginate-$this->paginate : 0;
        $requests = CalcSpecialRequest::latest()->paginate($this->paginate);
//        return $requests;

        return view('admin.calculator.calc_specials.index', compact('requests', 'page'));
    }

    public function show ($id)
    {
        $request = CalcSpecialRequest::with('images')->findOrFail($id);
//        $data = json_decode($request->data);
//        dd($request->data);
        return view('admin.calculator.calc_specials.show', compact('request'));
    }

    public function update($id)
    {
        CalcSpecialRequest::find($id)->toggle()->save();

        return response()->json( [
            "class" => "success", "message" => 'Статус изменен.'
        ] );
    }

    public function destroyAll(Request $request)
    {
        if($request->requests && count($request->requests)){

            CalcSpecialRequest::destroy($request->requests);

            return redirect()->route('special.requests.index')
                ->with(['message' => 'Заявки удалены', 'class' => 'success']);
        } else {
            return back()->with(['message' => 'Не выбрано ни одной заявки', 'class' => 'warning']);
        }
    }
    public function destroy( CalcSpecialRequest $request ) {

        if ($request->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Заявка удалена'
            ] );
        }
    }
}
