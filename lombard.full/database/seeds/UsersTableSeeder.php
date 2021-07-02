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
            'role' => 3,
            'password' => bcrypt('admin'),
            'published' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@mail.com',
            'role' => 2,
            'password' => bcrypt('manager'),
            'published' => 1
        ]);
    }
}
