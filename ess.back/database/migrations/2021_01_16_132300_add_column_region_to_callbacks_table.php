<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRegionToCallbacksTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('callbacks', function (Blueprint $table) {
      $table->string('region')->nullable()->after('email');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('callbacks', function (Blueprint $table) {
      $table->dropColumn('region');
    });
  }
}
