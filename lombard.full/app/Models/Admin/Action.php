<?php

namespace App\Models\Admin;

use App\Models\Admin\City;
use App\Models\Common\Image;
use Illuminate\Database\Eloquent\Model;
// use App\Search\Searchable;
use Illuminate\Support\Facades\DB;

class Action extends Model
{
    use \App\Traits\Scopes;
    use \App\Traits\HandleImage;
    use \App\Traits\Imageable;
//    use Searchable;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($action) {

            $action->images->each->delete();

            $action->deleteWithThumbnail($action->image, 'action');
        });
    }

    /**
     * @param $data
     * @param $request
     *
     * @return bool
     */
    public function saveAction($data, $request)
    {
        if (isset($data['photo'])) {
            $data['photo'] = $this->saveImage($data['photo'], 'action', 378, 227);
        }

        if (isset($data['wide_photo'])) {
            $data['wide_photo'] = $this->saveImage($data['wide_photo'], 'action', 1200, null);
        }

        $data['alias'] = $data['alias'] ? $data['alias'] : str_slug($data['title_ru']);

        if (isset($data['start_at'])) {
            $data['start_at']  = date('Y-m-d', strtotime($data['start_at']));
        }

        if (isset($data['finish_at'])) {
            $data['finish_at']  = date('Y-m-d', strtotime($data['finish_at']));
        }
//
//        $data['start_at']  = date('Y-m-d', strtotime($data['start_at']));
//        $data['finish_at'] = date('Y-m-d', strtotime($data['finish_at']));

        unset($data['_method']);
        unset($data['_token']);
        unset($data['url']);

        if (isset($data['gallery'])) {
            unset($data['gallery']);
        }

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


    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

}
