<?php

namespace App\Models\Common\Calculator;

use App\Models\Common\Tariff;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class CalcTariff extends Model
{
    use \App\Traits\Scopes;
    use NodeTrait;

    protected $fillable = ['title_ru', 'title_uk', 'calc_category_id', 'published', 'related_tariff'];

    public function category()
    {
        return $this->belongsTo(CalcCategory::class, 'calc_category_id', 'id');
    }

    public function statuses()
    {
        return $this->belongsToMany(CalcStatus::class, 'calc_status_calc_tariff', 'calc_tariff_id', 'calc_status_id');
    }

    public function relatedTariff()
    {
        return $this->belongsTo(Tariff::class, 'related_tariff', 'id');
    }

    public function hallmarks()
    {
        return $this->hasMany(CalcHallmark::class);
    }

    public function terms()
    {
        return $this->hasMany(CalcTerm::class);
    }

    public function maxAmounts()
    {
        return $this->hasMany(CalcMaxAmount::class);
    }

    public function rates()
    {
        return $this->hasMany(CalcRate::class);
    }

    public function prices()
    {
        return $this->hasMany(CalcPrice::class);
    }
}
