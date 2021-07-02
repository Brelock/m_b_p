<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNameTitleUkToReviewsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('reviews', function (Blueprint $table) {
      $table->dropColumn('alias');
      $table->renameColumn('title_uk', 'text_uk');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('reviews', function (Blueprint $table) {
      $table->string('alias')->after('id');
      $table->renameColumn('text_uk', 'title_uk');
    });
  }
}
