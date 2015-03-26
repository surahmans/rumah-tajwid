<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('users')->delete();

        $users = [
            [
                'id'        => 1,
                'name'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => 'admin',
                'level'     => 'admin'
            ],
            [
                'id'        => 2,
                'name'  => 'surahman',
                'email'     => 'surahman.duang@gmail.com',
                'password'  => 'rahasia',
                'level'     => 'author'
            ],
            [
                'id'        => 3,
                'name'  => 'Yuliana Agustin',
                'email'     => 'yui@gmail.com',
                'password'  => 'salam',
                'level'     => 'author'
            ],
        ];

        DB::table('users')->insert($users);
    }

}