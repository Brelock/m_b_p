<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function handleLocale ($lang)
    {
        $referer = \Illuminate\Support\Facades\Redirect::back()->getTargetUrl(); //URL предыдущей страницы

        $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

        //разбиваем на массив по разделителю
        $segments = explode('/', $parse_url);

        //Если URL (где нажали на переключение языка) содержал корректную метку языка
        if (in_array($segments[1], \App\Http\Middleware\LocaleMiddleware::$languages)) {

            unset($segments[1]); //удаляем метку
        }

        //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
        if ($lang != \App\Http\Middleware\LocaleMiddleware::$mainLanguage) {
            array_splice($segments, 1, 0, $lang);
        }

        //формируем полный URL
        $url = implode("/", $segments);
//    $url = Request::root().implode("/", $segments);

        //если были еще GET-параметры - добавляем их
        if (parse_url($referer, PHP_URL_QUERY)) {

            $url = $url . '?' . parse_url($referer, PHP_URL_QUERY);
        }

        return redirect($url); //Перенаправляем назад на ту же страницу
    }
}
