<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKantinButtonToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('title_ru')->nullable()->after('youtube');
            $table->string('title_uk')->nullable()->after('title_ru');
            $table->text('description_ru')->nullable()->after('title_uk');
            $table->text('description_uk')->nullable()->after('description_ru');
            $table->string('button_ru')->nullable()->after('description_uk');
            $table->string('button_uk')->nullable()->after('button_ru');
            $table->string('link')->nullable()->after('button_uk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'title_ru',
                'title_uk',
                'description_ru',
                'description_uk',
                'button_ru',
                'button_uk',
                'link'
            ]);
        });
    }
}
