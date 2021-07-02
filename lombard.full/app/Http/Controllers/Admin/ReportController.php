<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommonRequest;
use App\Models\Common\Document;
use App\Models\Admin\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $documents = Document::get();
        return view('admin.reports.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.reports.create');
    }

    public function edit($id)
    {
        return view('admin.reports.create', compact('report'));
    }

    public function store(CommonRequest $request)
    {
        $report = new Report;

        $this->saveReport($request, $report);

        return redirect()->route('reports.index')
            ->with(['message' => 'Отчет сохранён', 'class' => 'success']);
    }

    private function saveReport(CommonRequest $request)
    {
        $input = $request->except('_token', '_method', 'documents', 'document_titles');
        $input['alias'] = $request->alias ? $request->alias : str_slug($request->title_ru);


        if ($request->has('document_titles')) {
            foreach ($request->document_titles as $document_id => $document_title){
//                if ($document_title){
//                    Document::whereId($document_id)->update(['title' => $document_title]);
//                }
                Document::whereId($document_id)->update(['title' => $document_title]);
            }

        }
        if ($request->has('documents')){

            $badchar = array(
                // control characters
                chr(0), chr(1), chr(2), chr(3), chr(4), chr(5), chr(6), chr(7), chr(8), chr(9), chr(10),
                chr(11), chr(12), chr(13), chr(14), chr(15), chr(16), chr(17), chr(18), chr(19), chr(20),
                chr(21), chr(22), chr(23), chr(24), chr(25), chr(26), chr(27), chr(28), chr(29), chr(30),
                chr(31),
                // non-printing characters
                chr(127), '(', ')', ' '
            );

            foreach ($request->documents as $document){
                $doc_name = str_replace($badchar, '', pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$document->getClientOriginalExtension();
                $doc = Document::firstOrCreate([
                    'path' => $doc_name,
                    'type' => $document->getClientOriginalExtension(),
                ]);
                $doc->save();
                $document->move(storage_path() . '/app/documents', $doc_name);
            }
        }
    }

    public function update(CommonRequest $request)
    {

        $this->saveReport($request);

        return redirect()->route('reports.index')
            ->with(['message' => 'Отчет сохранён', 'class' => 'success']);
    }

    public function destroyAll(Request $request)
    {
        if($request->reports && count($request->reports)){

            Report::destroy($request->reports);

            return redirect()->route('reports.index')
                ->with(['message' => 'Отчеты удалены', 'class' => 'success']);
        } else {
            return back()->with(['message' => 'Не выбрано ни одного отчета', 'class' => 'warning']);
        }

    }
    public function destroy( Report $report ) {

        if ($report->delete()){
            return response()->json( [
                "class" => "success", "message" => 'Отчет удален'
            ] );
        }
    }

    public function destroyCertificate(Report $report)
    {
        if ($report->update(['certificate' => null])){
            return response()->json( [
                "class" => "success", "message" => 'Сертификат удален'
            ] );
        }
        return response()->json( [
            "class" => "warning", "message" => 'Не получилось удалить сертификат.'
        ] );
    }
}