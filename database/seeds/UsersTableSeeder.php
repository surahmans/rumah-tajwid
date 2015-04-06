<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
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
                'password'  => bcrypt('admin'),
                'level'     => 'admin'
            ],
            [
                'id'        => 2,
                'name'  => 'surahman',
                'email'     => 'surahman.duang@gmail.com',
                'password'  => bcrypt('rahasia'),
                'level'     => 'author'
            ],
            [
                'id'        => 3,
                'name'  => 'Yuliana Agustin',
                'email'     => 'yui@gmail.com',
                'password'  => bcrypt('salam'),
                'level'     => 'author'
            ],
        ];

        DB::table('users')->insert($users);
    }

}