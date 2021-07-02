<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSunportsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('sunports', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->string('alias');
      $table->string('title_uk');
      $table->string('title_ru')->nullable();
      $table->float('price')->default(0.00);
      $table->string('xls_file_name')->nullable();
      $table->text('sub_title_uk');
      $table->text('sub_title_ru')->nullable();
      $table->string('seo_title_uk')->nullable();
      $table->string('seo_title_ru')->nullable();
      $table->string('picture_file_name')->nullable();

      $table->unsignedInteger('display_order')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('sunports');
  }
}
