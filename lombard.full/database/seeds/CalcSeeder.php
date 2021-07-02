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
        DB::table('calc_tariffs')->insert([
            'title_ru' => 'Gold',
            'title_uk' => 'Gold',
            'calc_category_id' => 1,
        ]);
        DB::table('calc_tariffs')->insert([
            'title_ru' => 'Silver',
            'title_uk' => 'Silver',
            'calc_category_id' => 2,
        ]);

        // hallmarks
        DB::table('calc_hallmarks')->insert([
            'hallmark' => 500,
            'calc_tariff_id' => 1,
            'calc_category_id' => 1,
        ]);
        DB::table('calc_hallmarks')->insert([
            'hallmark' => 585,
            'calc_tariff_id' => 1,
            'calc_category_id' => 1,
        ]);
        DB::table('calc_hallmarks')->insert([
            'hallmark' => 875,
            'calc_tariff_id' => 2,
            'calc_category_id' => 2,
        ]);
        DB::table('calc_hallmarks')->insert([
            'hallmark' => 925,
            'calc_tariff_id' => 2,
            'calc_category_id' => 2,
        ]);

        // statuses
        DB::table('calc_statuses')->insert([
            'title_ru' => 'Лом',
            'title_uk' => 'Лом'
        ]);
        DB::table('calc_statuses')->insert([
            'title_ru' => 'Залог',
            'title_uk' => 'Залог'
        ]);
// total_amounts
        DB::table('calc_max_amounts')->insert([
            'value' => 3000,
            'calc_tariff_id' => 1,
        ]);
        DB::table('calc_max_amounts')->insert([
            'value' => 6000,
            'calc_tariff_id' => 1,
        ]);
        DB::table('calc_max_amounts')->insert([
            'value' => 3000,
            'calc_tariff_id' => 2,
        ]);
        DB::table('calc_max_amounts')->insert([
            'value' => 6000,
            'calc_tariff_id' => 2,
        ]);
// terms
        DB::table('calc_terms')->insert([
            'from' => 1,
            'to' => 365,
            'calc_tariff_id' => 1,
        ]);
        DB::table('calc_terms')->insert([
          'from' => 1,
            'to' => 365,
            'calc_tariff_id' => 2,
        ]);


    }
}
