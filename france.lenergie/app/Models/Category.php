<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    protected $with = [
        'products'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
