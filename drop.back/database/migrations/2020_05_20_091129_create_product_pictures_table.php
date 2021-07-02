<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPicturesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('product_pictures', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('product_id');
      $table->foreign('product_id')->references('id')->on('products');

      $table->string('file_name', 1024);

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('product_pictures');
  }
}
