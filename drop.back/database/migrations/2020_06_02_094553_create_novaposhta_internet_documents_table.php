<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaposhtaInternetDocumentsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('novaposhta_internet_documents', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('order_id')->nullable();
      $table->foreign('order_id')->references('id')->on('orders');

      $table->string('ttn');
      $table->string('ref');
      $table->float('cost')->default(0.00);
      $table->string('estimated_delivery_date')->nullable();
      $table->string('type_document')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('novaposhta_internet_documents');
  }
}
