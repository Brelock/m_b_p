<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcGadgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('calc_gadgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->index();
            $table->string('brand')->index();
            $table->string('model')->index();
            $table->string('image')->nullable();
            $table->integer('price');
            $table->text('description');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::dropIfExists('calc_gadgets');*/
    }
}
