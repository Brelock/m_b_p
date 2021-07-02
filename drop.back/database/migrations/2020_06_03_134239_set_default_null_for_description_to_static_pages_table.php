<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetDefaultNullForDescriptionToStaticPagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('static_pages', function (Blueprint $table) {
			$table->text('description')->nullable()->change();;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('static_pages', function (Blueprint $table) {
			$table->text('description')->change();
		});
	}
}
