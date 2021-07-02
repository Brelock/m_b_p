<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Promo;
use Illuminate\Http\Request;
use App\Http\Requests\PromoRequest;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class PromoController extends Controller
{
    protected $promo;

    /**
     * PromoController constructor.
     */
    public function __construct()
    {
        $this->promo = new Promo;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request):View
    {
        $elemsOnPage = 15;
        $request->page = $request->page ? $request->page : 1;

        $counter = $request->page * $elemsOnPage - $elemsOnPage;
        $promos = Promo::get();
        return view('admin.promos.index', ['promos' => $promos, 'counter' => $counter]);
    }

    /**
     * @return View
     */
    public function create():View
    {
        return view('admin.promos.create', ['promo' => $this->promo]);
    }

    /**
     * @param PromoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PromoRequest $request)
    {
        $requestData = $request->all();

        $result = $this->promo->savePromo($requestData, $request);

        if($result)
            return redirect('admin/promos')->with(['message' => 'Промо сохранено', 'class' => 'success']);
        else
            return redirect('admin/promos')->with(['message' => 'При сохранении возникла ошибка', 'class' => 'error']);
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id):View
    {
        $promo = Promo::findOrFail($id);

        return view('admin.promos.create', ['promo' => $promo]);
    }

    /**
     * @param PromoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PromoRequest $request, $id)
    {
        $requestData = $request->all();

        $this->promo = $this->promo->findOrFail($id);

        $result = $this->promo->savePromo($requestData, $request);

        if($result)
            return redirect($request->url)->with(['message' => 'Промо сохранена', 'class' => 'success']);
        else
            return redirect($request->url)->with(['message' => 'При сохранении возникла ошибка', 'class' => 'error']);
    }

    /**
     * @param Promo $promo
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Promo $promo)
    {
        if ( $promo->delete() )
        {
            return response()->json( ['message' => 'Промо удалено', 'class' => 'success'] );
        }
    }

    /**
     * @param Request $request
     */
    public function deleteImage(Request $request)
    {
        $this->promo->deleteImage( $request->get('src') );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyAll(Request $request)
    {
        if( $request->promos && count($request->promos) ){

            $this->promo->destroy($request->promos);

            return redirect('admin/promos')->with(['message' => 'Промо удалены.', 'class' => 'success']);

        } else {

            return back()->with(['message' => 'Не выбрано ни одной промо', 'class' => 'warning']);

        }
    }
}
