<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ConfigsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('configs')->delete();

        $config = [
            [
                'name'  => 'paginate',
                'value' => 3
            ]
        ];

        DB::table('configs')->insert($config);
    }

}