<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tag::class, function (Faker $faker) {
    $images = [
        'backgrounds/about-bg.jpg',
        'backgrounds/contact-bg.jpg',
        'backgrounds/home-bg.jpg',
        'backgrounds/post-bg.jpg'
    ];
    $word = $faker->unique()->name;
    return [
        'tag'               => $word,
        'title'             => ucfirst($word),
        'subtitle'          => $faker->sentence,
        'page_image'        => $images[mt_rand(0, 3)],
        'meta_description'  => "Meta for $word",
        'reverse_direction' => false,
    ];
});


