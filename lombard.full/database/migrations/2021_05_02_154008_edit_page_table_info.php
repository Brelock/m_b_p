<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPageTableInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('pages')->truncate();
        DB::table('pages')->insert(
            [
                [
                    'title_ru' => 'О компании',
                    'title_uk' => 'Про компанію',
                    'description_ru' => 'Компания',
                    'description_uk' => 'Компанія',
                    'alias' => 'about'
                ],
                [
                    'title_ru' => 'Реквизиты',
                    'title_uk' => 'Реквизиты',
                    'description_ru' => 'реквизиты',
                    'description_uk' => 'реквизиты',
                    'alias' => 'requisites'
                ],
                [
                    'title_ru' => 'Карьера',
                    'title_uk' => 'Карьера',
                    'description_ru' => 'Карьера',
                    'description_uk' => 'Карьера',
                    'alias' => 'сareer'
                ],
            ]
        );
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
