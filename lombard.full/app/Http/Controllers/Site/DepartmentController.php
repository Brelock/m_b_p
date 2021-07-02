<?php

namespace App\Http\Controllers\Site;

use App\Filters\DepartmentsFilters;
use App\Models\Admin\City;
use App\Models\Common\Office;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;

class DepartmentController extends Controller
{
    public function index()
    {
        $cities = City::published()->orderBy('title_ru')->get();
        return view('site.departments.departments-front', ['cities' => $cities]);
    }

    public function show($id)
    {
        $department = Office::published()->whereNumber($id)->with('temporaryOffice')->firstOrFail();

        return view('site.departments.show', ['department' => $department]);

    }

    protected function getDepartments(DepartmentsFilters $filters)
    {
        if ($filters->getFilters()) {
            $departments = Office::filter($filters)->orderBy('id', 'ASC')->published();
        } else {
            $departments = Office::published()->orderBy('id', 'ASC');
        }

        $departments_filtered = $departments->get()->toArray();

        return response()->json($departments_filtered, '200');
    }

}