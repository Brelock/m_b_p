<?php

use App\Models\FileUnload;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileUnloadSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    FileUnload::query()->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    factory(FileUnload::class, 5)->create(['file_name' => null]);
    factory(FileUnload::class, 1)->create(['file_url' => null, 'description' => null]);
  }
}
