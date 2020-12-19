<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed an admin
        DB::table('users')->insert([
            'name' => 'admin',
            'mobile_number' => '0788293020',
            'user_type' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);
    }

}
