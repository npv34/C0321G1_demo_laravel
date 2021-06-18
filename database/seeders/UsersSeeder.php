<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Ngoc',
                'email' => 'ngoc@gmail.com',
                'address' => 'HN',
                'password' => Hash::make('123456'),
                'group_id' => 1
            ],
            [
                'name' => 'Hai',
                'email' => 'hai@gmail.com',
                'address' => 'HN',
                'password' => Hash::make('123456'),
                'group_id' => 2
            ],
        ]);
    }
}
