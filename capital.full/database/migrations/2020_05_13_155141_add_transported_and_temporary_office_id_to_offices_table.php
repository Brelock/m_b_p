<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransportedAndTemporaryOfficeIdToOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
          $table->tinyInteger('transported')->default(0)->after('work_days_uk');
          $table->integer('temporary_office_id')->nullable()->after('transported');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function (Blueprint $table) {
          $table->dropColumn([
            'transported',
            'temporary_office_id'
          ]);
        });
    }
}
