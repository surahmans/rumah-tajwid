<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 8) as $index)
        {
            $tag = $faker->word;

            \App\Tag::create([

                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);

        }
    }

}