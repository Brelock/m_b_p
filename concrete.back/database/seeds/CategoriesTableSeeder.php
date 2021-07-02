<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Enums\CategoryTypes;

class CategoriesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    Category::query()->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    DB::table('categories')->insert([
        'title' => 'Slabs or Footings',
        'type' => CategoryTypes::SLAB,
        'formula' => '(length*width*(height/12)*quantity)/27',
    ]);
    DB::table('categories')->insert([
        'title' => 'Walls',
        'type' => CategoryTypes::WALL,
        'formula' => '(length*(width/12)*height*quantity)/27',
    ]);
    DB::table('categories')->insert([
        'title' => 'Round Columns',
        'type' => CategoryTypes::COLUMN,
        'formula' => '(3.1416*(diameter/24)*(diameter/24)*depth*quantity)/27',
    ]);
  }
}
