<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $guarded = [];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
