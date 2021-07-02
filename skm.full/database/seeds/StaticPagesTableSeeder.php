<?php

use Illuminate\Database\Seeder;

class StaticPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('static_pages')->insert([
            'slug' => 'contacts',
            'title' => 'Контакты',
            'description' => 'Контакты описание',
            'meta_title' => 'SKM',
            'meta_description' => 'SKM',
        ]);

        DB::table('static_pages')->insert([
            'slug' => 'about',
            'title' => 'О нас',
            'description' => 'О нас описание',
            'meta_title' => 'SKM',
            'meta_description' => 'SKM',
        ]);

        DB::table('static_pages')->insert([
            'slug' => 'guarantees',
            'title' => 'Гарантии',
            'description' => 'Гарантии описание',
            'meta_title' => 'SKM',
            'meta_description' => 'SKM',
        ]);

        DB::table('static_pages')->insert([
            'slug' => 'cooperation',
            'title' => 'Сотрудничество',
            'description' => 'Сотрудничество описание',
            'meta_title' => 'SKM',
            'meta_description' => 'SKM',
        ]);
    }
}
