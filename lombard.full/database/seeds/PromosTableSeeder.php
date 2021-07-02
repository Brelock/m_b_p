<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 3; $i++) {
            $id = DB::table('promos')->insertGetId([
                'title_ru' => 'Промо 1',
                'title_uk' => 'Промо 1 укр',
                'alias' => 'promo'.$i,
                'description_ru' => 'наш ломбард уважает право клиента, и сделка проведится тактично и анонимно',
                'description_uk' => 'наш ломбард поважає право клієнта, і угода проведена тактовно і анонімно',
                'photo' => 'image.jpeg',
                'wide_photo' => 'image.jpeg',
                'client_photo' => 'image.jpeg',
            ]);
        }
    }
}
