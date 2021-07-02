<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileUnloadsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('file_unloads', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title');
      $table->string('file_url')->nullable();
      $table->string('file_name')->nullable();
      $table->date('date_unloaded')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('file_unloads');
  }
}
