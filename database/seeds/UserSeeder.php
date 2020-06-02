<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Mr. Admin',
            'email' => "arif.softron@gmail.com",
            'password' => bcrypt('rootadmin'),
            'type' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Mr. User',
            'type' => 2,
            'email' => "arifulislam1194@gmail.com",
            'password' => bcrypt('rootuser'),
        ]);
    }
}
