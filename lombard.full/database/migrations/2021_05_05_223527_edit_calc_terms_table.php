<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCalcTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_terms', function (Blueprint $table) {
            $table->integer('calc_category_id');
            $table->float('value',4,3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calc_terms', function (Blueprint $table) {
            $table->dropColumn([
                'calc_category_id','value'
            ]);
        });
    }
}
