<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('categories')->delete();

        $categories = [
            [
                'name'  => 'Info Kegiatan',
                'slug'  => 'info-kegiatan'
            ],
            [
                'name'  => 'Artikel',
                'slug'  => 'artikel'
            ],
            [
                'name'  => 'Info Pendaftaran',
                'slug'  => 'info-pendaftaran'
            ],
            [
                'name'  => 'Rumta Eropa',
                'slug'  => 'rumta-eropa'
            ]
        ];

        DB::table('categories')->insert($categories);
    }

}