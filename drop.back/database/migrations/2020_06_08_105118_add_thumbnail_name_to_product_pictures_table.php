<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThumbnailNameToProductPicturesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('product_pictures', function (Blueprint $table) {
			$table->string('thumbnail_name', 1024)->after('file_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('product_pictures', function (Blueprint $table) {
			$table->dropColumn('thumbnail_name');
		});
	}
}
