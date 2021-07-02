<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductParamsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('product_params', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('product_id');
      $table->foreign('product_id')->references('id')->on('products');

      $table->string('title_uk');
      $table->string('title_ru')->nullable();
      $table->string('value_uk');
      $table->string('value_ru')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('product_params');
  }
}
