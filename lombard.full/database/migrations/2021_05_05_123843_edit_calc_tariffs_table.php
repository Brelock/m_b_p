<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCalcTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_tariffs', function (Blueprint $table) {
            $table->dropForeign(['calc_category_id']);
            $table->dropColumn(['calc_category_id','_lft','_rgt','parent_id']);
            $table->renameColumn('related_tariff','related_office');
        });
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
