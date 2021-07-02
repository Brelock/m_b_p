<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('seo', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->string('redirect_uri', 2083);

			$table->string('title_uk');
			$table->string('title_ru')->nullable();

			$table->text('description_uk');
			$table->text('description_ru')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('seo');
	}
}
