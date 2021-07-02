<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;
    use \App\Traits\Imageable;

    protected $fillable =
        [
            'title_ru',
            'title_uk',
            'alias',
            'description_ru',
            'description_uk',
            'meta_title_ru',
            'meta_title_uk',
            'meta_description_ru',
            'meta_description_uk',
            'photo',
            'wide_photo',
            'client_photo',
            'photo_uk',
            'wide_photo_uk',
            'client_photo_uk',
            'link',
        ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($promo) {

            $promo->deleteWithThumbnail($promo->photo, 'promo');
            $promo->deleteWithThumbnail($promo->wide_photo, 'promo');
            $promo->deleteWithThumbnail($promo->client_photo, 'promo');
            $promo->deleteWithThumbnail($promo->photo_uk, 'promo');
            $promo->deleteWithThumbnail($promo->wide_photo_uk, 'promo');
            $promo->deleteWithThumbnail($promo->client_photo_uk, 'promo');
        });
    }

    /**
     * @param $data
     * @param $request
     * @return bool
     */
    public function savePromo($data, $request)
    {
        if (isset($data['photo'])) {
            $data['photo'] = $this->saveImage($data['photo'], 'promo', 350, 237);
        }

        if (isset($data['wide_photo'])) {
            $data['wide_photo'] = $this->saveImage($data['wide_photo'], 'promo', 960, 650);
        }

        if (isset($data['client_photo'])) {
            $data['client_photo'] = $this->saveImage($data['client_photo'], 'promo', 418, 320);
        }
        if (isset($data['photo_uk'])) {
            $data['photo_uk'] = $this->saveImage($data['photo_uk'], 'promo', 350, 237);
        }

        if (isset($data['wide_photo_uk'])) {
            $data['wide_photo_uk'] = $this->saveImage($data['wide_photo_uk'], 'promo', 960, 650);
        }

        if (isset($data['client_photo_uk'])) {
            $data['client_photo_uk'] = $this->saveImage($data['client_photo_uk'], 'promo', 418, 320);
        }

        $data['alias'] = $data['alias'] ? $data['alias'] : str_slug($data['title_ru']);

        $data['meta_title_ru'] = $request->meta_title_ru ? $request->meta_title_ru : $request->title_ru;
        $data['meta_title_uk'] = $request->meta_title_uk ? $request->meta_title_uk : $request->title_uk;
        $data['meta_description_ru'] = $request->meta_description_ru ? $request->meta_description_ru : substr(strip_tags(html_entity_decode($request->description_ru)), 0, strrpos(substr(strip_tags(html_entity_decode($request->description_ru)), 0, 300), ' '));
        $data['meta_description_uk'] = $request->meta_description_uk ? $request->meta_description_uk : substr(strip_tags(html_entity_decode($request->description_uk)), 0, strrpos(substr(strip_tags(html_entity_decode($request->description_uk)), 0, 300), ' '));

        $this->fill($data);

        $status = $this->save();

        if ($status) {
            return true;
        } else {
            return false;
        }
    }

}
