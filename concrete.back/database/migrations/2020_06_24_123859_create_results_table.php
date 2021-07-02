<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('results', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');

			$table->float('length', 10, 2)->default(0.00);
			$table->float('width', 10, 2)->default(0.00);
			$table->float('height', 10, 2)->default(0.00);
			$table->float('diameter', 10, 2)->default(0.00);
			$table->float('depth', 10, 2)->default(0.00);
			$table->integer('quantity')->default(0);
			$table->float('result', 10, 2)->default(0.00);

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('results');
	}
}
