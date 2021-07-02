<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSubDescriptionAndIsKnessToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('sub_description_uk')->nullable()->after('description_ru');
            $table->text('sub_description_ru')->nullable()->after('sub_description_uk');
            $table->tinyInteger('is_kness')->default(0)->after('sub_description_ru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sub_description_uk', 'sub_description_ru', 'is_kness');
        });
    }
}
