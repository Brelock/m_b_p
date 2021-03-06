<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App;
use Illuminate\Support\Facades\Route;
use Jenssegers\Date\Date;
use Request;

class LocaleMiddleware
{
    public static $mainLanguage = 'ru'; //основной язык, который не должен отображаться в URl

    public static $languages = ['ru', 'uk']; // Указываем, какие языки будем использовать в приложении.

    /*
     * Проверяет наличие корректной метки языка в текущем URL
     * Возвращает метку или значеие null, если нет метки
     */
    public static function getLocale()
    {
        $uri = Request::path(); //получаем URI

        $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"

        //Проверяем метку языка  - есть ли она среди доступных языков
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], self::$languages)) {

            if ($segmentsURI[0] != self::$mainLanguage) return $segmentsURI[0];
        }
        return null;
    }

    /*
    * Устанавливает язык приложения в зависимости от метки языка из URL
    */
    public function handle($request, Closure $next)
    {
        if (!session()->has('redirected_visitor')){
            session(['redirected_visitor' => true]);

            $segments = explode('/', $request->path());

            if ($segments[0] != 'uk'){
                return redirect('uk/'.$request->path());
            }

        }
        $locale = self::getLocale();

        if($locale){
            App::setLocale($locale);
            Carbon::setLocale($locale);
            Date::setLocale(app()->getLocale());
        }
        //если метки нет - устанавливаем основной язык $mainLanguage
        else {
            App::setLocale(self::$mainLanguage);
            Carbon::setLocale($locale);
            Date::setLocale(app()->getLocale());
        }
        return $next($request); //пропускаем дальше - передаем в следующий посредник
    }
}
