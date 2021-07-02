<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductParamTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('product_param', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('product_id');
      $table->foreign('product_id')->references('id')->on('products');

      $table->unsignedBigInteger('param_id');
      $table->foreign('param_id')->references('id')->on('params');

      $table->string('value');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('product_param');
  }
}
