<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleTagTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $articles = \App\Article::all()->lists('id');
        $tags = \App\Tag::all()->lists('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('article_tag')->insert([
                'article_id' => $faker->randomElement($articles),
                'tag_id'     => $faker->randomElement($tags),
            ]);
        }

    }

}