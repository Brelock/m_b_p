<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ru');
            $table->string('title_uk');
            $table->text('description_ru');
            $table->text('description_uk');
            $table->string('alias')->index();
            $table->tinyInteger('published')->default(1);
            $table->string('image')->nullable();
            $table->string('type')->default('news');
            $table->string('meta_title_ru')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->string('meta_title_uk')->nullable();
            $table->text('meta_description_uk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
