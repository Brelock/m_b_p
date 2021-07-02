<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    Setting::query()->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    DB::table('settings')->insert([
        'title' => 'Concrete Calculator',
        'subtitle' => 'The Concrete Calculator is designed
      to estimate the volume in cubic yardc of concrete necessary to cover a given area.r',
        'email' => 'admin@gmail.com',
        'footer' => '@ 2020 Concrete Calculations, All Rights Reserved',
    ]);
  }
}
