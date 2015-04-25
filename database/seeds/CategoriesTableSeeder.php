<?php

use Illuminate\Database\Seeder;

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