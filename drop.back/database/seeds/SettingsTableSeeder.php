<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \Illuminate\Support\Facades\Artisan::call(\App\Console\Commands\SyncNovaPoshtaBaseSender::class);
    \Illuminate\Support\Facades\Artisan::call(\App\Console\Commands\SyncNovaPoshtaBaseSenderLocation::class);
  }
}
