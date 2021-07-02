<?php

namespace App\Models\Common;

use App\Models\Admin\Code;
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

    public function getTimeEndAttribute($value)
    {
        if ($value){
            return Carbon::parse($value)->format('H:i');
        }
    }

    public function getCityLocationAttribute()
    {
        $title = 'title_' . app()->getLocale();

        return app()->getLocale() == 'ru' ? 'г. ' . $this->city->$title : 'м. ' . $this->city->$title;
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
     * @param $codeInput
     * @param Code $oldCode
     * @throws \Exception
     */
    public function saveCode($codeInput, Code $oldCode)
    {
        $this->deleteImage($oldCode->path, 'codes');
        $oldCode->delete();

        $path = $this->storeCodeImage($codeInput, 'codes');

        $this->addCode(['path' => $path]);
    }

    /**
     * @param $id
     * @param PDF $pdf
     * @return string
     */
    public function makeCode($id, PDF $pdf)
    {
        $canvas = Image::canvas(4961, 7016);

        /* Add background for QR image */
        $backgroundPath = public_path('img/code-background.jpg');
        $canvas->insert($backgroundPath);

        /* Generate QR code image*/
        $codeUrl = \request()->root(). '/departments/'. $id . '/chooseEvaluation/';
        $path = public_path('images/temp/code'.time().rand(10000, 99999).'.png');
        QrCode::format('png')->size(2300)->generate($codeUrl, $path);

        /* Add QR code to background */
        $canvas->insert($path, 'top-left',1295,2000);

        /* Add address department for view */
        $office = Office::query()->whereId($id)->first();
        $locale = app()->getLocale();
        $officeAddress = $office['street_type_'.$locale].' '.$office['address_'.$locale];

        /* Finale code path */
        $code_path = public_path('images/temp/'. 'codes_for_office_'. $id .'_date_' . time() . '.jpg');

        /* Save image with QR code */
        $canvas->save($code_path);

        /* Get base64_decode for image */
        $imageData = $canvas->encode('data-url');

        /* create view */
        $pdf = $pdf->loadView('site.departments.code', compact('imageData', 'officeAddress'));

        /* delete Qr-code image and finale image with code */
        File::delete([$path, $code_path]);

        return $pdf;
    }

  /**
   * @return bool
   */
  public function isTransported() {
    return $this->transported == self::TRANSPORTED;
  }

}
