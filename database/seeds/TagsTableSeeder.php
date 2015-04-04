<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TagsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tags')->delete();

        $tags = [
            [
                'id'    => 1,
                'name'  => 'Qur\'an'
            ],
            [
                'id'    => 2,
                'name'  => 'Tajwid'
            ],
            [
                'id'    => 3,
                'name'  => 'Motivasi'
            ],
            [
                'id'    => 4,
                'name'  => 'Beasiswa'
            ]
        ];

        DB::table('tags')->insert($tags);
    }

}