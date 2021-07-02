<?php

namespace App\Http\Controllers\Site;

use App\Models\Common\Seo;
use App\Models\Site\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        $meta_tags = Seo::whereAlias('report')->first();

        return view('site.reports.index', compact('reports', 'meta_tags'));
    }

    public function show(Report $report)
    {
        $report->load(['documents' => function($query){
            $query->orderBy('id', 'asc');
        }]);

        return view('site.reports.show', compact('report'));
    }

    public function downloadFile()
    {
        $filePath = urldecode(request('document'));
        if (\request()->has('document') && Storage::disk('documents')->exists($filePath)){
            return response()->download(storage_path() . '/app/documents/'. $filePath);
        }
        return back();
    }

}
