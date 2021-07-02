<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;



trait HandleImage
{/**
 * ПЕРЕД ИСПОЛЬЗОВАНИЕМ НЕ ЗАБУДЬ ЗАПУСТИТЬ    php artisan storage:link
 */
    public function saveImage( $file, $dir, $width, $height )
    {

        $image_name = $file->hashName();

        $image = Image::make($file)
            ->fit($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })
            ->encode();

        $path = 'public/images/'.$dir.'/'.$image_name;

        Storage::put($path, $image->__toString());

        return $image_name;
    }

    public function saveOriginalImage( $file, $dir )
    {

        $image_name = $file->hashName();

        $image = Image::make($file)->encode();

        $path = 'public/images/'.$dir.'/'.$image_name;

        Storage::put($path, $image->__toString());

        return $image_name;
    }

    public function saveOriginalFile( $file, $dir )
    {
        $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.time().'.'.$file->getClientOriginalExtension();

        $path = 'public/images/'.$dir.'/';

        Storage::putFileAs($path, $file, $file_name);

        return $file_name;
    }

    public function saveWithThumbnail( $file, $dir, $width, $height, $thumb_width, $thumb_height )
    {
        $image_name = $file->hashName();

        $image = Image::make($file)
            ->fit($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg');
        $image_thumb = Image::make($file)
            ->fit($thumb_width, $thumb_height, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode();

        $path = 'public/images/'.$dir.'/'.$image_name;
        $path_thumb = 'public/images/'.$dir.'/thumbnails/'.$image_name;

        Storage::put($path, $image->__toString());
        Storage::put($path_thumb, $image_thumb->__toString());

        return $image_name;
    }
    public function saveImageFromPath( $file, $dir, $width, $height )
    {
        $image_name = strtolower(basename($file));

        if (File::exists(public_path() .$file)){
            $image = Image::make(public_path() .$file)
                ->fit($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode();

            $path = 'public/images/'.$dir.'/'.$image_name;

            Storage::put($path, $image->__toString());
        }

        return $image_name;
    }

    public function saveFromPathWithThumbnail( $file, $dir, $width, $height, $thumb_width, $thumb_height )
    {
        $image_name = basename($file);

        if (File::exists(public_path() .$file)){
            $image = Image::make(public_path() .$file)
                ->fit($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode();
            $image_thumb = Image::make(public_path() .$file)
                ->fit($thumb_width, $thumb_height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode();

            $path = 'public/images/'.$dir.'/'.$image_name;
            $path_thumb = 'public/images/'.$dir.'/thumbnails/'.$image_name;

            Storage::put($path, $image->__toString());
            Storage::put($path_thumb, $image_thumb->__toString());
        }

        return $image_name;
    }

    public function deleteImage($image = null, $dir)
    {
        if ($image){
            $path = 'public/images/'.$dir.'/'.$image;

            if (Storage::exists($path)){
                Storage::delete($path);
            }
        }
    }

    public function deleteWithThumbnail($image, $dir)
    {
        $path = '/public/images/'.$dir.'/'.$image;
        $path_thumb = 'public/images/'.$dir.'/thumbnails/'.$image;

        if (Storage::exists($path)){
            Storage::delete($path);
            Storage::delete($path_thumb);
            return true;
        } else {
            return 'нет такого файла...';
        }
    }

    public function deleteDocument($document, $dir)
    {
        if (Storage::exists($document)){

            $path = '/'.$dir.'/'.$document;
            Storage::delete($path);
        }

    }

    public function deleteMainPageImage($image, $dir)
    {
        if ($image){
            $path = '/img/'.$dir.'/'.$image;

            if (Storage::exists($path)){
                Storage::delete($path);
            }
        }
    }

    public function saveCertifecate($file, $dir, $height)
    {
        $image_name = $file->hashName();
        // resize image to new height but do not exceed original size
        $image = Image::make($file)->heighten($height, function ($constraint) {
            $constraint->upsize();
        })->encode();

        $path = 'public/images/'.$dir.'/'.$image_name;

        Storage::put($path, $image->__toString());

        return $image_name;
    }

    public function saveRequestImage($file, $dir, $width)
    {
        if (Storage::exists('public/temp/'.basename($file))){

            $image_name = basename($file);

//             resize image to new width but do not exceed original size
            $image = Image::make(public_path('storage/temp/'.$image_name))->widen($width, function ($constraint) {
                $constraint->upsize();
            })->encode();

            $path = 'public/images/'.$dir.'/'.$image_name;

            Storage::put($path, $image->__toString());

            return $image_name;
        }

        return false;
    }

    public function storeCodeImage($file, $dir)
    {
        $image_name = $file->hashName();
        // resize image to new height but do not exceed original size
        $image = Image::make($file)->encode();

        $path = 'public/images/'.$dir.'/'.$image_name;

        Storage::put($path, $image->__toString());

        return $image_name;
    }
}