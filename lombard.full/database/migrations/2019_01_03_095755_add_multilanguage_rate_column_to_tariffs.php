<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultilanguageRateColumnToTariffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*Schema::table('tariffs', function (Blueprint $table) {
            $table->string('rate_ru')->nullable()->after('rate');
            $table->string('rate_uk')->nullable()->after('rate');
            $table->string('note_ru')->nullable()->after('term_ru');
            $table->string('note_uk')->nullable()->after('term_uk');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('tariffs', function (Blueprint $table) {
            $table->dropColumn('rate_ru');
            $table->dropColumn('rate_uk');
            $table->dropColumn('note_ru');
            $table->dropColumn('note_uk');
        });*/
    }
}
