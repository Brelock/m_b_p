<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkRuLinkUkColumnsToTariffsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('tariffs', function (Blueprint $table) {
			$table->string('link_ru')->nullable()->after('note_uk');
			$table->string('link_uk')->nullable()->after('link_ru');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('tariffs', function (Blueprint $table) {
			$table->dropColumn('link_ru', 'link_uk');
		});
	}
}
