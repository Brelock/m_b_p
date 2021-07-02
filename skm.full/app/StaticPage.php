<?php

namespace  App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'meta_title',
        'meta_description'
    ];

    public static $pages = [
        'about',
        'contacts',
        'guarantees',
        'cooperation'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
