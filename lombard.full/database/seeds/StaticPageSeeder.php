<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*статические страницы*/

        DB::table('pages')->insert([
            'title_ru' => 'О компании',
            'title_uk' => 'Про компанію',
            'description_ru' => 'Компания',
            'description_uk' => 'Компанія',
            'alias' => 'about'
        ]);
        DB::table('pages')->insert([
            'title_ru' => 'Реквизиты',
            'title_uk' => 'Реквизиты',
            'description_ru' => 'реквизиты',
            'description_uk' => 'реквизиты',
            'alias' => 'requisites'
        ]);

        DB::table('pages')->insert([
            'title_ru' => 'Карьера',
            'title_uk' => 'Карьера',
            'description_ru' => 'Карьера',
            'description_uk' => 'Карьера',
            'alias' => 'сareer'
        ]);
    }
}