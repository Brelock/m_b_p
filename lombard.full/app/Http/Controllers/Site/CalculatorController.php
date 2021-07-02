<?php

namespace App\Http\Controllers\Site;

use App\Jobs\SendCalcGadgetRequestSms;
use App\Jobs\SendNewGadgetRequestMail;
use App\Mail\NewGadgetRequest;
use App\Mail\NewRequest;
use App\Mail\NewSpecialRequest;
use App\Models\Admin\Settings;
use App\Models\Common\Calculator\CalcCategory;
use App\Models\Common\Calculator\CalcGadget;
use App\Models\Common\Calculator\CalcGadgetRequest;
use App\Models\Common\Calculator\CalcHallmark;
use App\Models\Common\Calculator\CalcMaxAmount;
use App\Models\Common\Calculator\CalcPrice;
use App\Models\Common\Calculator\CalcRate;
use App\Models\Common\Calculator\CalcRequest;
use App\Models\Common\Calculator\CalcSpecialRequest;
use App\Models\Common\Calculator\CalcStatus;
use App\Models\Common\Calculator\CalcTariff;
use App\Models\Common\Calculator\CalcTerm;
use App\Models\Common\Calculator\CalcWatch;
use App\Models\Common\City;
use App\Models\Common\Office;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CalculatorController extends Controller
{
    public function indexGold(Request $request)
    {
        $hallmarks = $this->getHallmarks($request);
        $statuses = CalcStatus::all();

        return view('site.gold.gold-front', compact('statuses', 'hallmarks'));

    }
    public function indexSilver(Request $request)
    {
        $hallmarks = $this->getHallmarks($request);
        $statuses = CalcStatus::all();

        return view('site.silver.silver-front', compact('statuses', 'hallmarks'));

    }
    public function indexTechnics(Request $request)
    {

        return view('site.technics.technics-front');

    }
    public function storeRequest(Request $request)
    {
        $order = new CalcRequest;
        $settings = Settings::first();

        $input = $request->except('file', '_token');
        $order->fill($input);

        if ($order->save()) {

            if ($request->has('file') && $request->file != null ) {

                $imageName = $order->saveOriginalImage($request->file, 'request');
                        $order->addImage($imageName);
            }
            $status = CalcStatus::where('id','=',$request['client_status'])->get()->toArray();
            $hallmark = CalcHallmark::where('id','=',$request['hallmark'])->get()->toArray();
            $tariff = Office::where('id','=',$request['tariff'])->get()->toArray();
            $category = CalcCategory::where('id','=',$request['category'])->get()->toArray();
            Mail::to($settings->admin_email)->send(new NewRequest($order,$status,$hallmark,$tariff,$category));
//            Mail::to($settings->admin_email)->send(new NewRequest($order));
            return response()->json([
                "message" => 'Заявка оформлена'
            ], 200);
        }

    }

    public function storeTempImage(Request $request)
    {
        if ($request->has('img')) {

            $names = [];
            foreach ($request->img as $image) {

                $image_name = basename($image->store('public/temp'));

                $names[] = asset('/storage/temp/' . $image_name);
            }

            return response()->json([
                "names" => $names
            ], 200);
        } else {
            return response()->json([
                "message" => 'что-то пошло не так'
            ]);
        }
    }

    public function destroyTempImage($name)
    {
        if (Storage::exists($name)) {
            Storage::delete($name);
            return response()->json([
                "message" => 'фото удалено'
            ]);
        }
    }

    public function storeGadgetRequest(Request $request)
    {
        $settings = Settings::first();

            $order = new CalcGadgetRequest;

            $input = $request->except('files', '_token');

            $order->fill($input);

            if ($order->save()) {

                if ($request->pics) {

                    foreach ($request->pics as $file) {
                        $imageName = $order->saveOriginalImage($file, 'gadget_request');
                        $order->addImage($imageName);
                    }

                }

                //Mail::to(config('app.techno_email'))->queue(new NewGadgetRequest($order));
                Mail::to($settings->admin_email)->send(new NewGadgetRequest($order));


                return response()->json([
                    "message" => 'Заявка оформлена'
                ], 200);
            } else {
                return response()->json([
                    "message" => 'беда'
                ], 501);
            }

    }

    public function storeSpecialRequest(Request $request)
    {
        $order = new CalcSpecialRequest;
//        $settings = Settings::first();

        $input = $request->only('name', 'email', 'phone', 'type');
        $input_data = $request->except('_token', 'files', 'name', 'email', 'phone', 'type');

        $input['data'] = json_encode($input_data);

        $order->fill($input);

        if ($order->save()) {

            if ($request->has('files')) {
                $files = explode(",", $request->input('files'));

                foreach ($files as $file) {

                    if (Storage::exists('public/temp/' . basename($file))) {

                        $imageName = $order->saveRequestImage($file, 'special_request', 900);
                        $order->addImage($imageName);
                    }
                }
            }
//            Mail::to($settings->admin_email)->send(new NewSpecialRequest($order));
            Mail::to(config('app.special_abilities_email'))->queue(new NewSpecialRequest($order));
            return response()->json([
                "message" => 'Заявка оформлена'
            ], 200);
        }

        return response()->json([
            "message" => 'беда'
        ], 501);
    }

    public function getCategories()
    {
        return CalcCategory::all();
    }

    public function getHallmarks(Request $request)
    {
        $probe = CalcHallmark::where('calc_category_id', $request->category)->distinct()->orderBy('hallmark')->get();

        return response()->json([
            "probe" => $probe->toArray()
        ], 200);
    }

    public function getTariffs(Request $request)
    {
            $tariffs = CalcTariff::published()
                ->with('relatedOffice')
                ->with('terms')
                ->where('related_office','<>',0)
                ->whereHas('terms', function($q) use ($request){
                    $q->where('calc_category_id', $request->categoryId);
                })
                ->get();
            return response()->json([
                "tariffs" => $tariffs->toArray()
            ], 200);
//        return CalcHallmark::where('calc_category_id', 1)->distinct()->get(['hallmark']);
    }
    public function getStatuses(Request $request)
    {
        $status = CalcStatus::get();
        return response()->json([
            "status" => $status->toArray()
        ], 200);
//        return CalcHallmark::where('calc_category_id', 1)->distinct()->get(['hallmark']);
    }
    public function getData(Request $request)
    {
        $tariffs = CalcTariff::published()
            ->with('relatedOffice')
            ->with('terms')
            ->where('related_office','<>',0)
            ->whereHas('terms', function($q) use ($request){
                $q->where('calc_category_id', $request->categoryId);
            })
            ->get();
        $probe = CalcHallmark::where('calc_category_id', $request->categoryId)->distinct()->orderBy('hallmark')->get();
        $status = CalcStatus::get();
        return response()->json([
            "tariffs" => $tariffs->toArray(),
            "probe" => $probe->toArray(),
            "status" => $status->toArray()
        ], 200);
//        return CalcHallmark::where('calc_category_id', 1)->distinct()->get(['hallmark']);
    }

    public function calculate(Request $request)
    {
        $msg = [
            'days.required' => 'нужно дни ввести, обязательно',
            'weight.required' => 'нужно указать вес',
//            'weight.integer' => 'должно быть число',
            'hallmark.required' => 'нужно указать пробу',
            'tariff.required' => 'нужно указать тариф',
            'hallmark.exists' => 'нет такой пробы',
            'tariff.exists' => 'нет такого тарифа',
            'status.required' => 'выберите статус пож-та',
            'status.exists' => 'нет такого статуса',
        ];
        $validator = \Validator::make($request->all(), [
//            'weight' => 'required|integer',
            'hallmark' => 'required|exists:calc_hallmarks,hallmark',
            'tariff' => 'required|exists:calc_tariffs,id',
            'status' => 'required|exists:calc_statuses,id',
            'days' => 'required'
        ], $msg);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $weight = (float)str_replace(',', '.', $request->weight);
        $hallmark = CalcHallmark::whereHallmark($request->hallmark)
            ->where('calc_tariff_id', $request->tariff)
            ->first();

        $tariff = CalcTariff::find($request->tariff);
        $status = CalcStatus::find($request->status);
        $days = (int)$request->days;

        //  получаем срок кредитования
        $term = CalcTerm::where('calc_tariff_id', $tariff->id)
            ->where('from', '<=', $request->days)
            ->where('to', '>=', $request->days)
            ->first();

        // получаем цену за грамм металла
        $price = CalcPrice::where('calc_tariff_id', $tariff->id)
            ->where('calc_status_id', $status->id)
            ->where('calc_hallmark_id', $hallmark->id)
            ->first();

        // предварительная стоимость изделия
        $amount = $weight * $price->value;

        // выбираем параметр максимальна сумма ( до 6000 например)
        $maxAmountsValues = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->where('value', '>=', $amount)->pluck('value')->toArray();

        if (count($maxAmountsValues)) {
            $maxAmount = min($maxAmountsValues);
            $maxAmount = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->where('value', $maxAmount)->first();
        } else {
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('Слишком большая сумма', 'Откуда у Вас столько золота?');
            return response($errors, 400);
//            $maxAmount = CalcMaxAmount::where('calc_tariff_id', $tariff->id)->first();
        }

        // получаем ставку по кредиту
        $rate = CalcRate::where('calc_tariff_id', $tariff->id)
            ->where('calc_status_id', $status->id)
            ->where('calc_max_amount_id', $maxAmount->id)
            ->where('calc_term_id', $term->id)
            ->first();

        // расчитываем переплату

        $overPayment = $amount * ($rate->value) / 100 * $days;

        return response()->json([
            "amount" => $amount, "overPayment" => $overPayment, "message" => 'Посчитал'
        ], 200);
    }

    public function correctPrice($price, $cond, $set)
    {
        switch ($cond) {
            case 1:
                $cond_rate = 0.13;
                break;
            case 2:
                $cond_rate = 0.34;
                break;
            case 3:
                $cond_rate = 0.45;
                break;
            case 4:
                $cond_rate = 0.475;
                break;
            case 5:
                $cond_rate = 0.515;
                break;
        }
        switch ($set) {
            case 1:
                $price_rate = 0.008;
                break;
            case 2:
                $price_rate = 0.0105;
                break;
            case 3:
                $price_rate = 0.04;
                break;
            case 4:
                $price_rate = 0.057;
                break;
            case 5:
                $price_rate = 0.1005;
                break;
        }
        if (isset($cond_rate) && isset($price_rate)){

            $coefficient = min($cond_rate + $price_rate, 0.6105);

            return ($price * $coefficient) * 1.305;
        } else {

            return 'что-то не так с коэффициентами';
        }


    }

    public function getCities()
    {
        return City::all();
    }

    public function getWatches()
    {
        return CalcWatch::all();
    }

    public function getDepartments($id)
    {
        return City::findOrFail($id)->departments;
    }
}