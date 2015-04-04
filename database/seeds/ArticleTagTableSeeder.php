<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ArticleTagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('article_tag')->delete();

        $pivot = [
            [
                'article_id' => 1,
                'tag_id'     => 1,
            ],
            [
                'article_id' => 1,
                'tag_id'     => 2,
            ],
            [
                'article_id' => 1,
                'tag_id'     => 3,
            ],
            [
                'article_id' => 2,
                'tag_id'     => 3,
            ],
            [
                'article_id' => 3,
                'tag_id'     => 3,
            ],
            [
                'article_id' => 4,
                'tag_id'     => 3,
            ],
            [
                'article_id' => 4,
                'tag_id'     => 4,
            ],
        ];

        DB::table('article_tag')->insert($pivot);
    }

}