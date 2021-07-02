<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('order_product', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('order_id')->nullable();
      $table->foreign('order_id')->references('id')->on('orders');

      $table->unsignedBigInteger('product_id')->nullable();
      $table->foreign('product_id')->references('id')->on('products');

      $table->integer('quantity')->default(1);

      $table->float('price_drop')->default(0.00);
      $table->float('price_trade')->default(0.00);

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('order_product');
  }
}
