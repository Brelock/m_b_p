<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'parent_id', 'title', 'description', 'slug', 'status'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean'
    ];

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get the Products for the Category.
     */
    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function parent() {
        return $this->belongsTo('App\Category','parent_id') ;
    }

    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }
}
