<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcHallmark extends Model
{
    protected $fillable = ['hallmark', 'calc_category_id','zalog','lom'];
//    protected $with = ['prices'];

}
