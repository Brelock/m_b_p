<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderingColumnToProductPicturesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('product_pictures', function (Blueprint $table) {
			$table->unsignedInteger('ordering')->default(1)->after('thumbnail_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('product_pictures', function (Blueprint $table) {
			$table->dropColumn('ordering');
		});
	}
}
