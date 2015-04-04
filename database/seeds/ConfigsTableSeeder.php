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
            ],
            [
                'name'  => 'facebook',
                'value' => 'https://www.facebook.com/pages/Rumah-Tajwid-Indonesia/119628428065731'
            ],
            [
                'name'  => 'maps',
                'value' => '-6.39750,  	106.81216'
            ],
            [
                'name'  => 'twitter',
                'value' => 'rumah_tajwid'
            ],
            [
                'name'  => 'alamat',
                'value' => 'Kantor: Jl. Jeruk III No. 106, Depok Jaya <br>
                            Pancoran Mas, Depok <br>
                            Telp: (021) 7721 3881 <br>
                            E-Mail: rumahtajwid@yahoo.co.id'
            ],

        ];

        DB::table('configs')->insert($config);
    }

}