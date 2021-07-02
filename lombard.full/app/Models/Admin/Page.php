<?php

namespace App\Models\Admin;

use App\Rewards;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($page){

            $page->deleteImage($page->image, 'page');
        });
    }

}
