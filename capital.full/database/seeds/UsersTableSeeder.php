<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'published' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@mail.com',
            'password' => bcrypt('manager'),
            'published' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'special_manager',
            'email' => 'sp_manager@mail.com',
            'password' => bcrypt('special_manager'),
            'published' => 1
        ]);
    }
}
