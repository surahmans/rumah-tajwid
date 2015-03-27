<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        DB::table('articles')->delete();

        $articles = [
            [
                'id'      => 1,
                'cover'   => '1.jpg',
                'title'   => 'Biasakan lah Membaca Al-Qur\'an',
                'slug'    => 'biasakan-lah-membaca-al-qur-an',
                'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem blanditiis consequatur cum cumque ea eius expedita, illum nobis non perferendis placeat sed sunt suscipit, temporibus vel voluptas. Blanditiis, ratione.',
                'user_id' => 3,
                'published_at' => date('Y-m-d'),
                'category_id'  => 1
            ],
            [
                'id'      => 2,
                'cover'   => '2.jpg',
                'title'   => 'Pembagian Qur\'an Menjadi 30 Juz',
                'slug'    => 'pembagian-qur-an-menjadi-30-juz',
                'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem blanditiis consequatur cum cumque ea eius expedita, illum nobis non perferendis placeat sed sunt suscipit, temporibus vel voluptas. Blanditiis, ratione.',
                'user_id' => 2,
                'published_at' => date('Y-m-d'),
                'category_id'  => 1
            ],
            [
                'id'      => 3,
                'cover'   => '3.jpg',
                'title'   => 'Hidup Mulia dengan Al-Qur\'an',
                'slug'    => 'hidup-mulia-dengan-al-qur-an',
                'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem blanditiis consequatur cum cumque ea eius expedita, illum nobis non perferendis placeat sed sunt suscipit, temporibus vel voluptas. Blanditiis, ratione.',
                'user_id' => 3,
                'published_at' => date('Y-m-d'),
                'category_id'  => 1
            ],
            [
                'id'      => 4,
                'cover'   => '1.jpg',
                'title'   => 'Agar Bacaan Kita Seperti Rasulullah',
                'slug'    => 'agar-bacaan-kita-seperti-rasulullah',
                'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem blanditiis consequatur cum cumque ea eius expedita, illum nobis non perferendis placeat sed sunt suscipit, temporibus vel voluptas. Blanditiis, ratione.',
                'user_id' => 2,
                'published_at' => date('Y-m-d'),
                'category_id'  => 1
            ],
            [
                'id'      => 5,
                'cover'   => '2.jpg',
                'title'   => 'Hiduplah Seperti Rasulullah',
                'slug'    => 'hiduplah-seperti-rasulullah',
                'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem blanditiis consequatur cum cumque ea eius expedita, illum nobis non perferendis placeat sed sunt suscipit, temporibus vel voluptas. Blanditiis, ratione.',
                'user_id' => 2,
                'published_at' => date('Y-m-d'),
                'category_id'  => 1
            ],
            [
                'id'      => 6,
                'cover'   => '2.jpg',
                'title'   => 'Pembukaan Kelas Baru',
                'slug'    => 'pembukaan-kelas-baru',
                'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem blanditiis consequatur cum cumque ea eius expedita, illum nobis non perferendis placeat sed sunt suscipit, temporibus vel voluptas. Blanditiis, ratione.',
                'user_id' => 2,
                'published_at' => date('Y-m-d'),
                'category_id'  => 3
            ],
        ];

        DB::table('articles')->insert($articles);

    }

}