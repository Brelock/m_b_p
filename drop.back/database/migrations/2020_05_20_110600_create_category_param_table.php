<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryParamTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('category_param', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('categories');

      $table->unsignedBigInteger('param_id');
      $table->foreign('param_id')->references('id')->on('params');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('category_param');
  }
}
