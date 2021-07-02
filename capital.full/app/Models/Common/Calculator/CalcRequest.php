<?php

namespace App\Models\Common\Calculator;

use App\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CalcRequest
 * @package App\Models\Common\Calculator
 *
 * @method Builder|self adminFilter($filters)
 */
class CalcRequest extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;
    use \App\Traits\Imageable;

    protected $guarded = [];



    public function toggle()
    {
        $this->status = !$this->status;
        return $this;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($request)
        {
            $request->images->each->delete();
        });
    }

	public function scopeAdminFilter($query, Filters $filters)
	{
		return $filters->apply($query);
	}
}
