<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    User::query()->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    DB::table('users')->insert([
        'first_name' => 'admin',
        'last_name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456')
    ]);

    factory(User::class, 5)->create();
  }
}
