<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('news', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->string('alias');
			$table->string('title_uk');
			$table->string('title_ru')->nullable();
			$table->text('text_uk');
			$table->text('text_ru')->nullable();

			$table->boolean('is_published')->default(false);
			$table->date('publication_date')->nullable()->default(null);

			$table->string('picture_name')->nullable();
			$table->string('thumb_name')->nullable();

			$table->string('seo_title_uk')->nullable();
			$table->string('seo_title_ru')->nullable();
			$table->text('seo_description_uk')->nullable();
			$table->text('seo_description_ru')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('news');
	}
}
