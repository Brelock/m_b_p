<?php

namespace App\Http\Controllers\Admin;

use App\Models\Common\Calculator\CalcGadget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class CalcGadgetController extends Controller
{
    private $paginate = 20;

    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->page*$this->paginate-$this->paginate : 0;

        if ($request->has('q') and !empty ($request->q)){
            $input = $request->input();
            $gadgets = CalcGadget::where('model', 'like', "%{$request->q}%")
                ->orWhere('brand', 'like', "%{$request->q}%")
                ->paginate($this->paginate)
                ->appends(['q' => $input['q']]);
        } else {
            $gadgets = CalcGadget::latest()->paginate($this->paginate);
        }
        return view('admin.calculator.calc_gadgets.index', compact('gadgets', 'page'));
    }

    public function show(CalcGadget $gadget)
    {
        return view('admin.calculator.calc_gadgets.show', compact('gadget'));
    }


}
