<?php

use App\Enums\StaticPageTypes;
use App\Models\StaticPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaticPageSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    StaticPage::query()->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

	  DB::table('static_pages')->insert([
		  'title' => 'Оплата',
		  'type' => StaticPageTypes::PAYMENT
	  ]);

	  DB::table('static_pages')->insert([
		  'title' => 'Доставка',
		  'type' => StaticPageTypes::DELIVERY
	  ]);

	  DB::table('static_pages')->insert([
		  'title' => 'Контакты',
		  'type' => StaticPageTypes::CONTACTS
	  ]);

	  DB::table('static_pages')->insert([
		  'title' => 'График',
		  'type' => StaticPageTypes::SCHEDULE
	  ]);

	  DB::table('static_pages')->insert([
		  'title' => 'Самовывоз',
		  'type' => StaticPageTypes::PICKUP
	  ]);
  }
}
