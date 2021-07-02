<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcTerm extends Model
{
    protected $guarded = [];
    public function tariff()
    {
        return $this->belongsTo(CalcTariff::class, 'calc_tariff_id', 'id');
    }
}
