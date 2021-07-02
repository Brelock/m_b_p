<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ShopRequest;
use App\Shop;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\ShopService;

class ShopController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    public function index()
    {
        $shops = $this->shopService->getAll();
        return view('admin.shops.index')->with('shops', $shops);
    }

    public function store(ShopRequest $request)
    {
        $shop = new Shop();
        $shop->city = $request->city;
        $shop->address = $request->address ?: null;
        $shop->phone = $request->phone ?: null;
        $shop->email = $request->email ?: null;
        $shop->status = $request->status ? 1 : 0;
        $shop->save();
        if($request->has('image')){
            $shop->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.shops.index');
    }

    public function update(ShopRequest $request, Shop $shop)
    {
        $shop->update([
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone ?: null,
            'email' => $request->email ?: null,
            'status' => $request->status ? 1 : 0
        ]);

        if($request->has('image')){
            $shop->clearMediaCollection('images');
            $shop->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.shops.index');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();

        return redirect()->back();
    }
}
