<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * to run seeder you can call - php artisan db:seed --class=CalcSeeder
     *
     * @return void
     */
    public function run()
    {
        //  categories
        DB::table('calc_categories')->insert([
            'title_ru' => 'Золото',
            'title_uk' => 'Золото'
        ]);
        DB::table('calc_categories')->insert([
            'title_ru' => 'Серебро',
            'title_uk' => 'Срібло'
        ]);

        // tariffs
//        DB::table('calc_tariffs')->insert([
//            'title_ru' => 'Горячий старт',
//            'title_uk' => 'Гарячий старт',
//            'calc_category_id' => 1,
//        ]);
//        DB::table('calc_tariffs')->insert([
//            'title_ru' => 'Горячий старт',
//            'title_uk' => 'Гарячий старт',
//            'calc_category_id' => 2,
//        ]);
//        DB::table('calc_tariffs')->insert([
//            'title_ru' => 'Общий',
//            'title_uk' => 'Загальний',
//            'calc_category_id' => 1,
//        ]);
//        DB::table('calc_tariffs')->insert([
//            'title_ru' => 'Общий',
//            'title_uk' => 'Загальний',
//            'calc_category_id' => 2,
//        ]);

        // hallmarks
//        DB::table('calc_hallmarks')->insert([
//            'hallmark' => 500,
//            'calc_category_id' => 1,
//        ]);
//        DB::table('calc_hallmarks')->insert([
//            'hallmark' => 585,
//            'calc_category_id' => 1,
//        ]);
//        DB::table('calc_hallmarks')->insert([
//            'hallmark' => 875,
//            'calc_category_id' => 2,
//        ]);
//        DB::table('calc_hallmarks')->insert([
//            'hallmark' => 925,
//            'calc_category_id' => 2,
//        ]);

        // statuses
        DB::table('calc_statuses')->insert([
            'title_ru' => 'Без статуса',
            'title_uk' => 'Без статуса'
        ]);
        DB::table('calc_statuses')->insert([
            'title_ru' => 'Белый',
            'title_uk' => 'Білий'
        ]);
        DB::table('calc_statuses')->insert([
            'title_ru' => 'Серебряный',
            'title_uk' => 'Срібний'
        ]);
        DB::table('calc_statuses')->insert([
            'title_ru' => 'Золотой',
            'title_uk' => 'Золотий'
        ]);

        // terms
//        DB::table('calc_terms')->insert([
//            'from' => 1,
//            'to' => 7,
//            'calc_tariff_id' => 1,
//        ]);
//        DB::table('calc_terms')->insert([
//        'from' => 8,
//        'to' => 14,
//        'calc_tariff_id' => 1,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 15,
//            'to' => 21,
//            'calc_tariff_id' => 1,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 22,
//            'to' => 30,
//            'calc_tariff_id' => 1,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 1,
//            'to' => 7,
//            'calc_tariff_id' => 2,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 8,
//            'to' => 14,
//            'calc_tariff_id' => 2,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 15,
//            'to' => 21,
//            'calc_tariff_id' => 2,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 22,
//            'to' => 30,
//            'calc_tariff_id' => 2,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 1,
//            'to' => 7,
//            'calc_tariff_id' => 3,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 8,
//            'to' => 14,
//            'calc_tariff_id' => 3,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 15,
//            'to' => 21,
//            'calc_tariff_id' => 3,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 22,
//            'to' => 30,
//            'calc_tariff_id' => 3,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 1,
//            'to' => 7,
//            'calc_tariff_id' => 4,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 8,
//            'to' => 14,
//            'calc_tariff_id' => 4,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 15,
//            'to' => 21,
//            'calc_tariff_id' => 4,
//        ]);
//        DB::table('calc_terms')->insert([
//            'from' => 22,
//            'to' => 30,
//            'calc_tariff_id' => 4,
//        ]);

        // total_amounts
//        DB::table('calc_max_amounts')->insert([
//            'value' => 3000,
//            'calc_tariff_id' => 1,
//        ]);
//        DB::table('calc_max_amounts')->insert([
//            'value' => 6000,
//            'calc_tariff_id' => 1,
//        ]);
//        DB::table('calc_max_amounts')->insert([
//            'value' => 3000,
//            'calc_tariff_id' => 2,
//        ]);
//        DB::table('calc_max_amounts')->insert([
//            'value' => 6000,
//            'calc_tariff_id' => 2,
//        ]);
//        DB::table('calc_max_amounts')->insert([
//            'value' => 3000,
//            'calc_tariff_id' => 3,
//        ]);
//        DB::table('calc_max_amounts')->insert([
//            'value' => 6000,
//            'calc_tariff_id' => 3,
//        ]);
//        DB::table('calc_max_amounts')->insert([
//            'value' => 3000,
//            'calc_tariff_id' => 4,
//        ]);
//        DB::table('calc_max_amounts')->insert([
//            'value' => 6000,
//            'calc_tariff_id' => 4,
//        ]);


    }
}
