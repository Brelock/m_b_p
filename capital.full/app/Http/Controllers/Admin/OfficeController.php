<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EvaluationExport;
use App\Exports\ScheduleExport;
use App\Http\Requests\OfficeRequest;
use App\Models\Admin\Region;
use App\Models\Common\City;
use App\Models\Common\Evaluation;
use App\Models\Common\Office;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\ImageManagerStatic as Image;

class OfficeController extends Controller
{
  public function index(Request $request)
  {
    if ($request->has('q')) {
      $offices = Office::where('number', 'like', "%{$request->q}%")
        ->with(['evaluations' => function ($query) {
          $query->orderBy('mark');
        }])
        ->orWhereHas('parentCity', function ($query) use ($request) {
          $query->where('cities.title_ru', 'like', "%{$request->q}%");
        })
        ->withCount(['evaluations' => function ($query) {
          $query->where('comment', '!=', null);
        }])
        ->paginate(20)
        ->appends(['q' => $request['q']]);
    } else {
      $offices = Office::orderBy('number')
        ->with(['evaluations' => function ($query) {
          $query->orderBy('mark');
        }])
        ->withCount(['evaluations' => function ($query) {
          $query->where('comment', '!=', null);
        }])
        ->paginate(20);
    }

    return view('admin.offices.index', ['offices' => $offices]);
  }

  public function edit($id)
  {
    $transported = Office::TRANSPORTED;
    $office = Office::with('code')->findOrFail($id);
    $offices = Office::query()
      ->where('city_id', $office->city_id)
      ->whereNotIn('id', [$office->id])
      ->orderBy('number')
      ->get();
    $regions = Region::published()->get();
    $code = $office->code;

    return view('admin.offices.edit', compact('offices', 'office', 'regions', 'code', 'transported'));

  }

  public function showComments(Office $office)
  {
    $comments = $office->evaluations()->where('comment', '!=', null)->get();
    Carbon::setLocale('ru');

    return view('admin.offices.comments', compact('comments', 'office'));
  }

  public function getCode(Office $office, PDF $pdf)
  {
    return $office->makeCode($office->id, $pdf)->stream();
  }


  public function update(OfficeRequest $request)
  {
    $office = Office::findOrFail($request->get('id'));

    $marked = $this->saveOffice($request, $office);

    return redirect('admin/offices')->with(['message' => 'Отделение сохранено', 'class' => 'success', 'marked' => $marked->id]);
  }

  public function create()
  {
    $office = new Office();
    $regions = Region::published()->get();

    return view('admin.offices.edit', ['office' => $office, 'regions' => $regions]);
  }

  public function store(OfficeRequest $request)
  {
    $office = new Office();
    $this->saveOffice($request, $office);

    return redirect('admin/offices')->with(['message' => 'Отделение сохранено', 'class' => 'success']);
  }

  public function destroy($id)
  {
    if (is_array($id)) {
      $office = Office::whereIn('id', $id);
    } else {
      $office = Office::find($id);
    }
    if ($office->delete()) {
      return response()->json(['message' => 'Отделение удалено', 'class' => 'success'], 200);
    }
  }

  public function destroyAll(Request $request)
  {
    if ($request->offices && count($request->offices)) {
      $this->destroy($request->offices);

      return back()->with(['message' => 'Отделения удалены', 'class' => 'success']);
    }
  }

  private function saveOffice($request, $office)
  {
    $input = $request->except('_token', '_method', 'images');
    if ($request->has('image')) {
      $office->deleteImage($office->image, 'offices');

      $input['image'] = $office->saveImage($request->image, 'offices', 300, 254);
    } else {
      $input['image'] = $office->image;
    }
    if(!$request->has('transported'))
      $input['transported'] = 0;
    if (!$request->has('full_day')) {
      $input['full_day'] = null;
    }
    $office->fill($input);
    $office->save();

    if ($request->has('images')) {
      foreach ($request->images as $image) {
        // создали картинку, запись на диск, возвращает filename.jpeg
        $imageName = $office->saveWithThumbnail($image, 'offices', 900, 762, 300, 254);
        // создали запись в таблице images
        $office->addImage($imageName);
      }
    }
    return $office;
  }

  public function getCities(Request $request)
  {
    if (is_array($request->get('id'))) {
      return City::whereIn('region_id', $request->get('id'))->get();
    } else {
      return City::where('region_id', $request->get('id'))->get();
    }
  }

  /**
   * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
   */
  public function exportEvaluations() {
    return Excel::download(new EvaluationExport, 'evaluations.xlsx');
  }

  /**
   * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
   */
  public function exportSchedules() {
    return Excel::download(new ScheduleExport, 'schedules.xlsx');
  }
}
