<?php

namespace App\Models\Common;

use App\Models\Admin\TariffCategory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;

    protected $fillable = [
        'tariff_category_id',
        'title_ru',
        'sub_title_first_ru',
        'sub_title_second_ru',
        'description_ru',
        'title_uk',
        'sub_title_first_uk',
        'sub_title_second_uk',
        'description_uk',
        'rate_uk',
        'rate_ru',
        'term_ru',
        'note_ru',
        'term_uk',
        'note_uk',
        'link_ru',
        'link_uk',
        'published',
        'image',
    ];
    protected $table = 'tariffs';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($tariff){

            $tariff->deleteImage($tariff->image, 'tariffs');
        });
    }

    public function category()
    {
        return $this->belongsTo(TariffCategory::class, 'tariff_category_id');
    }

}
