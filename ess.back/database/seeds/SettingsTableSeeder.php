<?php

use App\Models\Settings;
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

    Settings::query()->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    DB::table('settings')->insert([
        'email' => 'admin@gmail.com',
    ]);
  }
}
