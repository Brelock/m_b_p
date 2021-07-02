<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        "name",
        "sku",
        "slug",
        "description",
        "price_user",
        "price_3_opt",
        "price_8_opt",
        "price_dealer",
        "price_vip",
        "category_id",
        "stock",
        "sale"
    ];

    protected $with = [
        'picture',
        'category',
    ];

    protected $casts = [
        'sale' => 'boolean'
    ];

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function getFullAmountPriceAttribute(){
        return $this->stock * $this->price_vip;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function picture(){
        return $this->hasOne(Picture::class);
    }

    public function category(){
        return $this->belongsTo(Category::class)->without('products');
    }

//    protected $guarded = [
//
//    ];
}
