<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('solutions', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->string('alias');
      $table->string('title_uk');
      $table->string('title_ru')->nullable();
      $table->unsignedInteger('power')->nullable();
      $table->string('picture_file_name')->nullable();
      $table->string('solution_url')->nullable();
      $table->unsignedInteger('display_order')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('solutions');
  }
}
