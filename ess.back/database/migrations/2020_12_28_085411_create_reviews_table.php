<?php

use App\Enums\ReviewsType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('reviews', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('alias');

      $table->string('title')->nullable();

      $table->enum('type', ReviewsType::getValues());

      $table->text('text_ru')->nullable();
      $table->text('title_uk')->nullable();

      $table->string('author_name_ru')->nullable();
      $table->string('author_name_uk')->nullable();

      $table->string('work_url')->nullable();

      $table->string('video_url')->nullable();

      $table->string('picture_file_name')->nullable();

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
    Schema::dropIfExists('reviews');
  }
}
