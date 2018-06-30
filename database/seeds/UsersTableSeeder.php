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
            'name' => str_random(6),
            'email' => strtolower(str_random(6)).'@test.com',
            'password' => bcrypt('test@123')
        ]);
    }
}
