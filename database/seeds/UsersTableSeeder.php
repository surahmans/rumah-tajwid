<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 5) as $index)
        {
            \App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->word),
                'level' => 'author'
            ]);
        }

        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin'
        ]);
    }

}