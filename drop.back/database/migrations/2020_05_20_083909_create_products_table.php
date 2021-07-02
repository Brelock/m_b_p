<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('products', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->boolean('available')->default(0);
      $table->string('name')->nullable();
      $table->float('price')->default(0.00);
      $table->float('price_old')->default(0.00);
      $table->integer('stock_quantity');

      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('categories');

      $table->text('description')->nullable();
      $table->string('vendor')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('products');
  }
}
