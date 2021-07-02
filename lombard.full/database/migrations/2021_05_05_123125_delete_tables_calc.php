<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTablesCalc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('calc_watches');
        Schema::dropIfExists('calc_prices');
        Schema::dropIfExists('calc_rates');
        Schema::dropIfExists('calc_max_amounts');
        Schema::dropIfExists('calc_status_calc_tariff');
        Schema::dropIfExists('calc_hallmarks');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
