<?php

namespace App\Http\Controllers\Admin;

use App\Filters\CalcRequestFilters;
use App\Models\Common\Calculator\CalcGadgetRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcGadgetRequestController extends Controller
{
    private $paginate = 20;

    public function index(Request $request, CalcRequestFilters $filters)
    {
        Carbon::setLocale('ru');
        $page = $request->has('page') ? $request->page*$this->paginate-$this->paginate : 0;
	      $input = $request->except('page');

        $requests = CalcGadgetRequest::adminFilter($filters)
	        ->latest()
	        ->paginate($this->paginate)
	        ->appends($input);

        return view('admin.calculator.calc_gadget_requests.index', compact('requests', 'page'));
    }

    public function show ($id)
    {
        $request = CalcGadgetRequest::with('images')->findOrFail($id);
        return view('admin.calculator.calc_gadget_requests.show', compact('request'));
    }

    public function update($id)
    {
        CalcGadgetRequest::find($id)->toggle()->save();

        return response()->json( [
            "class" => "success", "message" => 'Статус изменен.'
        ] );
    }

    public function destroyAll(Request $request)
    {
        if($request->requests && count($request->requests)){

            CalcGadgetRequest::destroy($request->requests);

            return redirect()->route('gadget.requests.index')
                ->with(['message' => 'Заявки удалены', 'class' => 'success']);
        } else {
            return back()->with(['message' => 'Не выбрано ни одной заявки', 'class' => 'warning']);
        }
    }
    public function destroy( CalcGadgetRequest $request ) {

        if ($request->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Заявка удалена'
            ] );
        }
    }
}
