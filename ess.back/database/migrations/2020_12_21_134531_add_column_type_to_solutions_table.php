<?php

use App\Enums\SolutionsType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTypeToSolutionsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('solutions', function (Blueprint $table) {
      $table->string('type')->after('alias')->default(SolutionsType::PRIVATE_PERSON);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('solutions', function (Blueprint $table) {
      $table->dropColumn('type');
    });
  }
}
