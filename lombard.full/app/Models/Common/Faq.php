<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use \App\Traits\Scopes;

    protected $fillable = ['title_ru', 'title_uk', 'description_ru', 'description_uk', 'published'];

}
