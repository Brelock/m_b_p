<?php

namespace App\Models\Common\Calculator;

use App\Models\Common\Office;
use App\Models\Common\Tariff;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Models\Common\Calculator\CalcTerm;
class CalcTariff extends Model
{
    use \App\Traits\Scopes;

    protected $fillable = ['title_ru', 'title_uk', 'published', 'related_office'];


    public function relatedOffice()
    {
        return $this->belongsTo(Office::class, 'related_office', 'id');
    }
    public function terms()
    {
        return $this->hasMany(CalcTerm::class);
    }

}
