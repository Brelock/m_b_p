<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcStatusCalcTariffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_status_calc_tariff', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('calc_status_id');
            $table->unsignedInteger('calc_tariff_id');
            $table->timestamps();

            $table->foreign('calc_status_id')->references('id')->on('calc_statuses')->onDelete('cascade');
            $table->foreign('calc_tariff_id')->references('id')->on('calc_tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calc_status_calc_tariff');
    }
}
