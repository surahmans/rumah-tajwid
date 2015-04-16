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
                'category'  => 5,
                'perpage'   => 3,
                'viewall'   => 'Lihat semua...',
                'maps'      => '-6.39750,  	106.81216',
                'facebook'  => 'https://www.facebook.com/pages/Rumah-Tajwid-Indonesia/119628428065731',
                'twitter'   => 'rumah_tajwid',
                'readmore'  => 'Selengkapnya...',
                'address'   => 'Kantor: Jl. Jeruk III No. 106, Depok Jaya <br>
                            Pancoran Mas, Depok <br>
                            Telp: (021) 7721 3881 <br>
                            E-Mail: rumahtajwid@yahoo.co.id'
            ]
        ];

        DB::table('configs')->insert($config);
    }

}