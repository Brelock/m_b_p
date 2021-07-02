<?php

namespace App\Models\Common\Calculator;

use App\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CalcGadgetRequest
 * @package App\Models\Common\Calculator
 *
 * @method Builder|self adminFilter($filters)
 */
class CalcGadgetRequest extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;
    use \App\Traits\Imageable;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'city',
        'office',
        'brand',
        'model',
        'cpu',
        'memory',
        'hdd',
        'video',
        'set',
        'condition',
        'category',
        'price',
        'status',
    ];
    protected $dates = [
        'created_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($request)
        {
            $request->images->each->delete();
        });
    }

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
