<?php

namespace App\Models\Common\Calculator;

use App\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CalcSpecialRequest
 * @package App\Models\Common\Calculator
 *
 * @method Builder|self adminFilter($filters)
 */
class CalcSpecialRequest extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;
    use \App\Traits\Imageable;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($request)
        {
            $request->images->each->delete();
        });
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }

//    public function setDataAttribute($value)
//    {
//        $this->attributes['data'] = json_encode($value);
//    }

    public function toggle()
    {
        $this->status = !$this->status;
        return $this;
    }

    public function scopeAdminFilter($query, Filters $filters)
		{
			return $filters->apply($query);
		}
}
