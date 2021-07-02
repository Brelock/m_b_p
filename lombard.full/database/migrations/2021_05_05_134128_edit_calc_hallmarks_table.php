<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCalcHallmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_hallmarks', function (Blueprint $table) {
            $table->float('lom');
            $table->float('zalog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calc_statuses', function (Blueprint $table) {
            $table->dropColumn([
                'lom','zalog'
            ]);
        });
    }
}
