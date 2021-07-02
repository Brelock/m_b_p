<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconNameIconTitleColumnsToFileUnloadsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('file_unloads', function (Blueprint $table) {
			$table->string('icon_name', 1024)->nullable()->after('date_unloaded');
			$table->string('icon_title')->nullable()->after('icon_name');
			$table->integer('quantity')->nullable()->after('icon_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('file_unloads', function (Blueprint $table) {
			$table->dropColumn('icon_name', 'icon_title', 'quantity');
		});
	}
}
