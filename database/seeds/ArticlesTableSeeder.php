<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 1) as $index)
        {
            $faker->image($dir = public_path() . '/images/article/tmp', $width=600, $height=400);
        }

        $userIds = \App\User::all()->lists('id');
        $catIds = \App\Category::all()->lists('id');

        foreach(range(1, 30) as $index)
        {
            $title = $faker->sentence(5);


            \App\Article::create([
                'cover'   => $faker->file($sourceDir = public_path() . '/images/article/tmp', $targetDir = public_path() . '/images/article', false),
                'title'   => $title,
                'slug'    => Str::slug($title),
                'body'    => '<p>'.$faker->text(400).'</p>' . '<p>'.$faker->text(800).'</p>' . '<p>'.$faker->text(1000).'</p>',
                'user_id' => $faker->randomElement($userIds),
                'published_at' => $faker->dateTimeThisMonth(),
                'category_id'  => $faker->randomElement($catIds),
                'slide'   => 0
            ]);
        }

    }

}