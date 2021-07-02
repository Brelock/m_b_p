<?php

namespace App\Models\Common\Calculator;

use Illuminate\Database\Eloquent\Model;

class CalcStatus extends Model
{
    protected $fillable = ['title_ru', 'title_uk'];

    public function prices()
    {
        return $this->hasMany(CalcPrice::class);
    }
    public function calcTariffs()
    {
        return $this->belongsToMany(CalcTariff::class, 'calc_status_calc_tariff', 'calc_status_id', 'calc_tariff_id');
    }
}
