<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaTagsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->text('meta_title_ru')->nullable();
            $table->text('meta_title_uk')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->text('meta_description_uk')->nullable();
            $table->text('meta_keywords_ru')->nullable();
            $table->text('meta_keywords_uk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('meta_title_ru', 'meta_title_uk', 'meta_description_ru', 'meta_description_uk');
        });
    }
}
