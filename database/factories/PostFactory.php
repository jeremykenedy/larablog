<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $images = [
        'https://picsum.photos/1600/900/?random',
        'https://source.unsplash.com/random/1600x900',
        'https://loremflickr.com/1600/900',
        'https://baconmockup.com/1600/900',
    ];
    $title = $faker->sentence(mt_rand(3, 10));

    return [
        'title'             => $title,
        'subtitle'          => str_limit($faker->sentence(mt_rand(10, 20)), 252),
        'post_image'        => $images[mt_rand(0, 3)],
        'content_raw'       => implode("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'published_at'      => $faker->dateTimeBetween('-1 month', '+3 days'),
        'author'            => $faker->name,
        'meta_description'  => "Meta for $title",
        'is_draft'          => rand(0, 1),
        'layout'            => 'blog.post-layouts.standard',
    ];
});
