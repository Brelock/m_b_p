<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcWatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalcWatchController extends Controller
{
    public function index()
    {
        $watches = CalcWatch::all();

        return view('admin.calculator.watches.index', compact('watches'));
    }
    public function getWatches()
    {
        $statuses = CalcWatch::all();
        return response()->json($statuses);

    }

    public function store(Request $request)
    {
        CalcWatch::create($request->only('brand'));

        return redirect()->route('watches.index')
            ->with(['message' => 'Бренд сохранен', 'class' => 'success']);
    }

    public function update(CalcWatch $status, Request $request)
    {
        if ($status->update($request->only('brand'))){
            return response()->json( [
                "class" => "success", "message" => 'Бренд сохранен'
            ] );
        } else {
            return response()->json( [
                "class" => "warning", "message" => 'Ну не знаю, почему-то не получилось обновить'
            ] );
        }
    }

    public function destroy(CalcWatch $watch)
    {
        if ($watch->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Бренд удален'
            ], 200 );
        } else {
            return response()->json( [
                "class" => "warning", "message" => 'Ну не знаю, почему-то не получилось удалить'
            ] );
        }
    }
}
