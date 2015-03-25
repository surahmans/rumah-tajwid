<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy

use Laracasts\TestDummy\Factory as TestDummy;

class MenuTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('menu')->delete();

        $menu = [
            [
                'name' => 'Home',
                'page' => '#',
                'parent_id' => null
            ],
            [
                'name' => 'Profile',
                'page' => '#',
                'parent_id' => null
            ],
            [
                'name' => 'Program',
                'page' => 'program-link',
                'parent_id' => null
            ],
            [
                'name' => 'Info Kegiatan',
                'page' => 'info-kegiatan-link',
                'parent_id' => null
            ],
            [
                'name' => 'Pendaftaran',
                'page' => 'pendaftaran-link',
                'parent_id' => null
            ],
            [
                'name' => 'Artikel',
                'page' => 'artikel-link',
                'parent_id' => null
            ],
            [
                'name' => 'Produk',
                'page' => 'produk-link',
                'parent_id' => null
            ],
            [
                'name' => 'Galeri',
                'page' => 'galeri-link',
                'parent_id' => null
            ],
            [
                'name' => 'Yayasan',
                'page' => 'yayasan-link',
                'parent_id' => 2
            ],
            [
                'name' => 'Asatidz',
                'page' => 'galeri-link',
                'parent_id' => 2
            ],
            [
                'name' => 'Peserta Didik',
                'page' => 'peserta-didik-link',
                'parent_id' => 2
            ],
            [
                'name' => 'Video',
                'page' => 'video-link',
                'parent_id' => 8
            ],
            [
                'name' => 'MP3',
                'page' => 'mp3-link',
                'parent_id' => 8
            ],
        ];

        DB::table('menu')->insert($menu);
    }

}