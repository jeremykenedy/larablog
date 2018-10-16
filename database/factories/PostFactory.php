<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $images = [
        'backgrounds/about-bg.jpg',
        'backgrounds/contact-bg.jpg',
        'backgrounds/home-bg.jpg',
        'backgrounds/post-bg.jpg',
    ];
    $title = $faker->sentence(mt_rand(3, 10));

    return [
        'title'             => $title,
        'subtitle'          => str_limit($faker->sentence(mt_rand(10, 20)), 252),
        // 'page_image'        => $images[mt_rand(0, 3)],
        'page_image'        => 'https://source.unsplash.com/random/1600x900',
        'content_raw'       => implode("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'published_at'      => $faker->dateTimeBetween('-1 month', '+3 days'),
        'author'            => $faker->name,
        'meta_description'  => "Meta for $title",
        'is_draft'          => false,
    ];
});
