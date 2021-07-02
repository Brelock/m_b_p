<?php

use Illuminate\Database\Seeder;
use \App\Models\Picture;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Picture::class)->create([
            'path' => '/storage/images/no-image.png'
        ]);
    }
}
