<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    function addNNewUser()
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

    function isLogin() {
        $user = new User([
            'name' => 'Ngoc',
            'email' => 'ngoc@gmail.com',
            'address' => 'HN',
            'password' => Hash::make('123456'),
            'group_id' => 1
        ]);
        $this->be($user);
    }
}
