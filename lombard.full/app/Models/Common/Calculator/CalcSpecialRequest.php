<?php

namespace App\Models\Common\Calculator;

use App\Models\Common\Image;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
}
