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
                'id'   => 1,
                'name' => 'Home',
                'page' => '#',
                'parent_id' => null
            ],
            [
                'id'   => 2,
                'name' => 'Profile',
                'page' => '#',
                'parent_id' => null
            ],
            [
                'id'   => 3,
                'name' => 'Program',
                'page' => 'program-link',
                'parent_id' => null
            ],
            [
                'id'   => 4,
                'name' => 'Info Kegiatan',
                'page' => 'info-kegiatan-link',
                'parent_id' => null
            ],
            [
                'id'   => 5,
                'name' => 'Pendaftaran',
                'page' => 'pendaftaran-link',
                'parent_id' => null
            ],
            [
                'id'   => 6,
                'name' => 'Artikel',
                'page' => 'artikel-link',
                'parent_id' => null
            ],
            [
                'id'   => 7,
                'name' => 'Produk',
                'page' => 'produk-link',
                'parent_id' => null
            ],
            [
                'id'   => 8,
                'name' => 'Galeri',
                'page' => 'galeri-link',
                'parent_id' => null
            ],
            [
                'id'   => 9,
                'name' => 'Yayasan',
                'page' => 'yayasan-link',
                'parent_id' => 2
            ],
            [
                'id'   => 10,
                'name' => 'Asatidz',
                'page' => 'galeri-link',
                'parent_id' => 2
            ],
            [
                'id'   => 11,
                'name' => 'Peserta Didik',
                'page' => 'peserta-didik-link',
                'parent_id' => 2
            ],
            [
                'id'   => 12,
                'name' => 'Video',
                'page' => 'video-link',
                'parent_id' => 8
            ],
            [
                'id'   => 13,
                'name' => 'MP3',
                'page' => 'mp3-link',
                'parent_id' => 8
            ],
        ];

        DB::table('menu')->insert($menu);
    }

}