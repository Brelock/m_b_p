<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageLinkButtonNameRuButtonNameUkColumnToBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('image_link')->after('link');
            $table->string('button_name_ru')->after('description_uk');
            $table->string('button_name_uk')->after('description_uk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn([
                'image_link',
                'button_name_ru',
                'button_name_uk'
            ]);
        });
    }
}
