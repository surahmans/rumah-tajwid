<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Illuminate\Support\Facades\Hash;
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'id'        => 1,
                'name'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('admin'),
                'level'     => 'admin'
            ],
            [
                'id'        => 2,
                'name'  => 'surahman',
                'email'     => 'surahman.duang@gmail.com',
                'password'  => Hash::make('salam'),
                'level'     => 'author'
            ],
            [
                'id'        => 3,
                'name'  => 'Yuliana Agustin',
                'email'     => 'yui@gmail.com',
                'password'  => Hash::make('salam'),
                'level'     => 'author'
            ],
        ];

        DB::table('users')->insert($users);
    }

}