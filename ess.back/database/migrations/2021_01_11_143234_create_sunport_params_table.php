<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSunportParamsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('sunport_params', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('sunport_id');
      $table->foreign('sunport_id')->references('id')->on('sunports');

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
    Schema::dropIfExists('sunport_params');
  }
}
