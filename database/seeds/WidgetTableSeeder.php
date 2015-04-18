<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class WidgetTableSeeder extends Seeder {

    public function run()
    {
        DB::table('widgets')->delete();

        $data = [
            'top'   => '<script></script>'
        ];

        DB::table('widgets')->insert($data);
    }

}