<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormatColumnToFileUnloadsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('file_unloads', function (Blueprint $table) {
			$table->integer('format')->default(1)->after('date_unloaded');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('file_unloads', function (Blueprint $table) {
			$table->dropColumn('format');
		});
	}
}
