<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoUkWidePhotoUkClientPhotoUkToPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->string('photo_uk');
            $table->string('wide_photo_uk');
            $table->string('client_photo_uk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropColumn([
                'photo_uk',
                'wide_photo_uk',
                'client_photo_uk'
            ]);
        });
    }
}
