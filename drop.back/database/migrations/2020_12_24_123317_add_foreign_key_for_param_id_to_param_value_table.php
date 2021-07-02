<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyForParamIdToParamValueTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('param_value', function (Blueprint $table) {
			$table->foreign('param_id')->references('id')->on('params');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('param_value', function (Blueprint $table) {
			$table->dropForeign(['param_id']);
		});
	}
}
