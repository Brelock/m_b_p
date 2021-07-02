<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelatedCategoryToCalcTariffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_tariffs', function (Blueprint $table) {
            $table->unsignedInteger('related_tariff')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calc_tariffs', function (Blueprint $table) {
            $table->dropColumn('related_tariff');
        });
    }
}
