<?php

namespace App\Models\Common;
use App;
use App\Models\Admin\Code;
use App\Models\Common\Calculator\CalcTariff;
use App\Traits\Scopes;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\ImageManagerStatic as Image;

class Office extends Model
{

    use Scopes;
    use \App\Traits\HandleImage;
    use \App\Traits\Imageable;

    const PUBLISHED = 1;
    const UNPUBLISHED = 0;

    const TRANSPORTED = 1;

    protected $appends = ['city_location', 'link', 'image_path', 'details'];

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($office) {
            $office->images->each->delete();

            $office->deleteWithThumbnail($office->image, 'office');
        });
    }


    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function tarif()
    {
        return $this->hasOne(CalcTariff::class, 'related_office', 'id');
    }
    public function parentCity()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function temporaryOffice() {
      return $this->belongsTo(Office::class, 'temporary_office_id', 'id');
    }

    public function code()
    {
        return $this->belongsTo(Code::class, 'office_id', 'id');
    }

    public function addCode($code)
    {
        return $this->code()->create($code);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function getImagePathAttribute()
    {
        if ($this->image and File::exists(public_path() .'/storage/images/offices/' . $this->image)){
            return '/storage/images/offices/' . $this->image;
        } else {
            return '/img/no_image_news.jpg';
        }

    }

    public function getTimeStartAttribute($value)
    {
        if ($value){
            return Carbon::parse($value)->format('H:i');
        }
    }
    public function getValue($value)
    {
        if ($value){
            return Carbon::parse($value)->format('H:i');
        }
    }
    public function getTimeEndAttribute($value)
    {
        if ($value){
            return Carbon::parse($value)->format('H:i');
        }
    }

    public function getCityLocationAttribute()
    {
        $title = 'title_' . app()->getLocale();
        if(app()->getLocale() == 'ru')
        {
            $city = 'г. ' . $this->city->$title;
        }
        else
        {
            $city = 'м. ' . $this->city->$title;
        }
        return $city;
    }

    /**
     * @return string
     */
    public function getLinkAttribute(){
        return 'departments/'.$this->number;
    }

    /**
     * @return array|string|null
     */
    public function getDetailsAttribute(){
        return __('main.details');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    /**
     * @param $evaluation
     * @return Model
     */
    public function evaluate($evaluation)
    {
        return $this->evaluations()->create($evaluation);
    }

  /**
   * @return bool
   */
  public function isTransported() {
    return $this->transported == self::TRANSPORTED;
  }

}
