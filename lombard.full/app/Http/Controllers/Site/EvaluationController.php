<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\EvaluationRequest;
use App\Mail\NewSadEvaluate;
use App\Models\Common\City;
use App\Models\Common\Evaluation;
use App\Models\Common\Office;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EvaluationController extends Controller
{
    /**
     * @param Office $office
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Office $office, Request $request) :View {
        $evaluation = $office->evaluate($request->all());

        return view('site.evaluations.edit', compact('evaluation'));
    }

    /**
     * @param Office $office
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chooseEvaluation(Office $office, Request $request) : View {
       return view('site.evaluations.choose', compact('office', 'request'));
    }

    /**
     * @param Office $office
     * @return View
     */
    public function goodEvaluate(Office $office) : View {
        $office->evaluate([
            'mark' => 1,
            'office_id' => $office->id
        ]);
        return view('site.evaluations.goodEvaluate');
    }

    /**
     * @return View
     */
    public function sadEvaluate() : View {
        return view('site.evaluations.sadEvaluate');
    }

    /**
     * @param Evaluation $evaluation
     * @param EvaluationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Evaluation $evaluation, EvaluationRequest $request)
    {
        if ($request->has('comment') || $request->has('phone')) {
            $evaluation->update([
                'comment' => $request->comment,
                'phone' => $request->phone
            ]);
        }

        $evaluation->load('office');
        Mail::to(env('EVALUATION_SAD_MAIL'))->send(new NewSadEvaluate($evaluation));

        return redirect(route('evaluations.sadEvaluate'));
    }

  /**
   * @return View
   */
    public function chooseOffice(): View{
      $cities = City::published()->orderBy('title_ru')->get();
      return view('site.evaluations.chooseOffice', ['cities' => $cities]);
    }
}
