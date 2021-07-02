<?php

use App\Enums\CategoryPictureTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPicturesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('category_pictures', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');

			$table->string('file_name');
			$table->enum('type', CategoryPictureTypes::getValues())->default(CategoryPictureTypes::MAIN);

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('category_pictures');
	}
}
