<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('projects', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('alias');
			$table->string('title_uk');
			$table->string('title_ru')->nullable();
			$table->unsignedInteger('display_order')->default(0);
			$table->string('seo_title_uk')->nullable();
			$table->string('seo_title_ru')->nullable();
			$table->text('seo_description_uk')->nullable();
			$table->text('seo_description_ru')->nullable();

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('projects');
	}
}
