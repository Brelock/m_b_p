<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisplayOrderColumnToFileUnloadsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('file_unloads', function (Blueprint $table) {
			$table->unsignedInteger('display_order')->nullable()->after('date_unloaded');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('file_unloads', function (Blueprint $table) {
			$table->dropColumn('display_order');
		});
	}
}
