<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSeoTableInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('seos')->truncate();
        DB::table('seos')->insert(
            [
                [
                    'title' => 'Главная страница',
                    'alias' => 'main',
                    'meta_title_ru' => 'Ломбард',
                    'meta_title_uk' => 'Ломбард',
                    'meta_description_ru' => 'Ломбард',
                    'meta_description_uk' => 'Ломбард'
                ],
                [
                    'title' => 'Акции',
                    'alias' => 'action',
                    'meta_title_ru' => 'Ломбард',
                    'meta_title_uk' => 'Ломбард',
                    'meta_description_ru' => 'Ломбард',
                    'meta_description_uk' => 'Ломбард'
                ],
                [
                    'title' => 'Новости',
                    'alias' => 'news',
                    'meta_title_ru' => 'Ломбард',
                    'meta_title_uk' => 'Ломбард',
                    'meta_description_ru' => 'Ломбард',
                    'meta_description_uk' => 'Ломбард'
                ],
                [
                    'title' => 'Отделения',
                    'alias' => 'office',
                    'meta_title_ru' => 'Ломбард',
                    'meta_title_uk' => 'Ломбард',
                    'meta_description_ru' => 'Ломбард',
                    'meta_description_uk' => 'Ломбард'
                ],
                [
                    'title' => 'Кредитный калькулятор',
                    'alias' => 'credit-calculator',
                    'meta_title_ru' => 'Ломбард',
                    'meta_title_uk' => 'Ломбард',
                    'meta_description_ru' => 'Ломбард',
                    'meta_description_uk' => 'Ломбард'
                ]
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
