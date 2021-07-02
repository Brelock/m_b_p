<?php

namespace App\Http\Controllers\Site;

use App\Filters\DepartmentsFilters;
use App\Models\Common\City;
use App\Models\Common\Office;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;

class DepartmentController extends Controller
{
    public function index()
    {
        $cities = City::published()->orderBy('title_ru')->get();

        return view('site.departments.index', ['cities' => $cities]);
    }

    public function show($id)
    {
        $department = Office::published()->whereNumber($id)->with('temporaryOffice')->firstOrFail();

        return view('site.departments.show', ['department' => $department]);

    }

    protected function getDepartments(DepartmentsFilters $filters)
    {
        if ($filters->getFilters()) {
            $departments = Office::filter($filters)->with('temporaryOffice')->orderBy('address_' . app()->getLocale(), 'ASC')->published();
        } else {
            $departments = Office::published()->with('temporaryOffice')->orderBy('address_' . app()->getLocale(), 'ASC');
        }
        $departments_filtered = $departments->get()->toArray();

        return response()->json($departments_filtered, '200');
    }

    public function downloadCodeForm()
    {
        return view('site.departments.code_form');
    }

    public function getCodes(PDF $pdf)
    {
        if (Office::where('number', request('office'))->doesntExist()){

            return back()->with(['code_error' => 'Нет такого отделения']);

        } else {
            $office = Office::where('number', request('office'))->first();

            return $office->makeCode($office->id, $pdf)->stream();
        }

    }
}