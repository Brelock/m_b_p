<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**  Redirects from old site  **/




//https://lombard-capital.com.ua/wp-content/uploads/2019/01/dva-logo.png


/**Auth Routes**/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//    // Registration Routes...
//    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Auth\RegisterController@register');
//
//    // Password Reset Routes...
//    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

//--------

/** Auth Routes **/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {

	Route::get('/', 'HomeController@index')->name('home');

	/** Manager Routes **/

		/*Route::group(['middleware' => ['can:manager']], function() {

			// заявки на оценку техники

			Route::get('/gadgets/requests', 'CalcGadgetRequestController@index')->name('gadget.requests.index');
			Route::get('/gadgets/requests/{request}', 'CalcGadgetRequestController@show')->name('gadget.requests.show');
			Route::post('/gadgets/requests', 'CalcGadgetRequestController@destroyAll')->name('gadget.requests.destroyAll');
			Route::delete('/gadgets/requests/{request}', 'CalcGadgetRequestController@destroy')->name('gadget.requests.destroy');
			Route::put('/gadgets/requests/{id}', 'CalcGadgetRequestController@update')->name('gadget.requests.update');

			// заявки на оценку техники
		});*/

	/** Manager Routes **/

	/** Admin Routes **/

    Route::group(['middleware' => ['can:admin']], function (){

        Route::delete('/images/{id}', 'ImageController@destroy');

        Route::get('/sitemap', function (){
            \Illuminate\Support\Facades\Artisan::call('command:sitemap');
            return back()->with('success', 'Карта сайта успешно обновлена');
        })->name('sitemap');
        Route::get('/gadgets/requests', 'CalcGadgetRequestController@index')->name('gadget.requests.index');
        Route::get('/gadgets/requests/{request}', 'CalcGadgetRequestController@show')->name('gadget.requests.show');
        Route::post('/gadgets/requests', 'CalcGadgetRequestController@destroyAll')->name('gadget.requests.destroyAll');
        Route::delete('/gadgets/requests/{request}', 'CalcGadgetRequestController@destroy')->name('gadget.requests.destroy');
        Route::put('/gadgets/requests/{id}', 'CalcGadgetRequestController@update')->name('gadget.requests.update');
        require_once('admin/actions.php');
        /*require_once('admin/tariffs.php');
        require_once('admin/tariff_categories.php');*/
        require_once('admin/faq_categories.php');
        require_once('admin/faqs.php');
        require_once('admin/news.php');
        require_once('admin/feedbacks.php');
        require_once('admin/clients.php');
        require_once('admin/users.php');
        require_once('admin/offices.php');
        require_once('admin/regions.php');
        require_once('admin/cities.php');
        require_once('admin/reports.php');
        require_once('admin/banners.php');
        require_once('admin/callbacks.php');
        require_once('admin/settings.php');
        require_once('admin/subscribers.php');
        require_once('admin/pages.php');
        require_once('admin/promos.php');
        require_once('admin/main.php');
        require_once('admin/vacancy_categories.php');
        require_once('admin/vacancy.php');
        require_once('admin/seo.php');
        require_once('admin/steps.php');
        require_once('admin/calculator.php');
        require_once('admin/links.php');
    });

	/** Admin Routes **/

	/** Special Manager and Admin Routes **/

	Route::group(['prefix' => 'calculator/specials/requests', 'middleware' => ['special.manager']], function () {

		// заявки на спецвозможности

		Route::get('/', 'CalcSpecialRequestController@index')->name('special.requests.index');
		Route::get('/{request}', 'CalcSpecialRequestController@show')->name('special.requests.show');
		Route::post('/', 'CalcSpecialRequestController@destroyAll')->name('special.requests.destroyAll');
		Route::delete('/{request}', 'CalcSpecialRequestController@destroy')->name('special.requests.destroy');
		Route::put('/{id}', 'CalcSpecialRequestController@update')->name('special.requests.update');


		// заявки на спецвозможности
	});

	/** Special Manager and Admin Routes **/
});
/** Auth Routes **/



Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'locale'], function () {


    Route::group(['namespace' => 'Site'], function () {

        Route::get('/', 'MainController@index')->name('site.home');

      ######   LINKS   ######

      //Route::get('/links', 'LinkController@index');

      ######   LINKS   ######

        //subscribe
        //Route::post('/main/subscribe', 'MainController@subscribe')->name('subscribe');
        //Route::get('/subscribers/activate', 'SubscriberController@activate')->name('activate');
        //Route::post('/main/discount', 'MainController@discount')->name('main.discount');

        /**часто задаваемые вопросы**/
        //Route::get('/faqs', 'FaqController@index')->name('faqs');

        /**новости**/

        Route::get('/news', 'NewsController@index')->name('news');
        Route::get('/news/{news}', 'NewsController@show')->name('news.show');

        /**промо**/

        //Route::get('/promo/{promo}', 'PromoController@show')->name('promo.show');

        /**тарифы**/
        //Route::get('/tariffs', 'TariffCategoryController@index')->name('tariffs');

        /**финансовая отчетность**/
       // Route::get('/reports', 'ReportController@index')->name('reports');
//        Route::get('/reports/document/report', function (){
//            abort(500);
//        })->name('reports.download.fake');
        //Route::get('/reports/document', 'ReportController@downloadFile')->name('reports.download');

        //Route::get('/reports/{report}', 'ReportController@show')->name('reports.show');

        /**callbacks**/
        Route::get('/callbacks/create', 'CallbackController@store')->name('callbacks.send');
        Route::get('/feedbacks/create', 'FeedbackController@store')->name('feedbacks.send');

        /**search**/
        //Route::get('/search', 'SearchController@index')->name('search');

        /**Вакансии**/

        //Route::get('/vacancies', 'VacancyController@index')->name('vacancies');


        /**акции**/
        Route::get('/actions', 'ActionController@index')->name('actions');
        Route::get('/actions/{actions}', 'ActionController@show')->name('actions.show');

        /**клиентам**/

        Route::get('/clients', 'ClientController@index')->name('clients');
        Route::get('/clients/{clients}', 'ClientController@show')->name('clients.show');

        /** Отделения **/

        Route::group(['prefix' => 'departments'], function() {
            Route::get('/', 'DepartmentController@index')->name('departments');
            Route::get('/get-departments', 'DepartmentController@getDepartments')->name('departments.getDepartments');
            Route::get('/choose-office/get-departments', 'DepartmentController@getDepartments');
            Route::get('/download-cods-form', 'DepartmentController@downloadCodeForm')->name('departments.codes.form');
           Route::get('/download-cods', 'DepartmentController@getCodes')->name('departments.codes.download');
            Route::get('/choose-office', 'EvaluationController@chooseOffice')->name('departments.chooseOffice');
            Route::get('/{id}', 'DepartmentController@show')->name('departments.show');

            /** Оценивание отделений **/
          //  Route::get('/{office}/chooseEvaluation', 'EvaluationController@chooseEvaluation')->name('departments.chooseEvaluation');
          //  Route::get('/{office}/good-evaluation', 'EvaluationController@goodEvaluate')->name('departments.goodEvaluation');
          //  Route::get('/{office}/evaluation', 'EvaluationController@store')->name('departments.evaluate');


          //  Route::group(['prefix' => 'evaluations'], function() {
          //      Route::put('/{evaluation}', 'EvaluationController@update')->name('evaluations.update');
          //      Route::get('/sad-evaluate', 'EvaluationController@sadEvaluate')->name('evaluations.sadEvaluate');
          //  });

            /** Оценивание отделений **/
        });

        /** Отделения **/

        /**  calculator */

        require_once('site_calculator.php');

        // 404
        Route::get('/404', function () {
            return view('site.errorPage.404-front');
        })->name('404');

        /** Статические страницы **/

        Route::get('/{page}', 'PageController@show')->name('pages.show');
        Route::get('/requisites/document', 'PageController@downloadFile')->name('reports.download');
    });

});

//Переключение языков

Route::get('setlocale/{lang}', 'LocalizationController@handleLocale')->name('setlocale');