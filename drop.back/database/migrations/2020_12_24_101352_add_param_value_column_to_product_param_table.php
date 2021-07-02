<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParamValueColumnToProductParamTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('product_param', function (Blueprint $table) {
			$table->unsignedBigInteger('param_value_id')->after('value');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('product_param', function (Blueprint $table) {
			$table->dropColumn('param_value_id');
		});
	}
}
