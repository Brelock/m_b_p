<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('settings', function (Blueprint $table) {
      $table->id();

      $table->string('novaposhta_sender_ref')->nullable();
      $table->string('novaposhta_sender_contact_ref')->nullable();
      $table->string('novaposhta_sender_phone_number')->nullable();

      $table->integer('novaposhta_sender_city_id')->nullable();
      $table->foreign('novaposhta_sender_city_id')->references('id')->on('novaposhta_city');

      $table->integer('novaposhta_sender_warehouse_id')->nullable();
      $table->foreign('novaposhta_sender_warehouse_id')->references('id')->on('novaposhta_warehouse');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('settings');
  }
}
