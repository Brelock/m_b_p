<?php

namespace App\Services;

use App\Slide;

class SlideService
{
    public  function  getAll()
    {
        return Slide::all();
    }

    public function getAllActive()
    {
        return Slide::where('status', 1)->get();
    }
}
