<?php

namespace App\Services;

use App\Shop;

class ShopService
{
    public  function  getAll()
    {
        return Shop::all();
    }

    public function getAllActive()
    {
        return Shop::where('status', 1)->get();
    }
}
