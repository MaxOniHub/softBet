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
            'name' => "Andrea M Spalding",
            'email' => "andrea@test.com",
            'password' => \Illuminate\Support\Facades\Hash::make("secret"),
            'company_name' => 'My Company',
            'address_line1' => '1184  Oak Way',
            'address_line2' => '',
            'city' => 'FLEMINGTON',
            'state' => 'NJ',
            'postal_code' => '08822',
        ]);
    }
}
