<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPicturesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('project_pictures', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('project_id');
			$table->foreign('project_id')->references('id')->on('projects');

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
		Schema::dropIfExists('project_pictures');
	}
}
