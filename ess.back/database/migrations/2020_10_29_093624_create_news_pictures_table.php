<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsPicturesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('news_pictures', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('news_id');
			$table->foreign('news_id')->references('id')->on('news');

			$table->tinyInteger('is_main')->default(0);
			$table->string('picture_name');
			$table->string('thumb_name')->nullable();

			$table->unsignedInteger('display_order')->default(0);

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
			Schema::dropIfExists('news_pictures');
	}
}
