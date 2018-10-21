<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tag::class, function (Faker $faker) {
    $images = [
        'https://picsum.photos/1600/900/?random',
        'https://source.unsplash.com/random/1600x900',
        'https://loremflickr.com/1600/900',
        'https://baconmockup.com/1600/900',
    ];
    $word = $faker->unique()->word;

    return [
        'tag'               => $word,
        'title'             => ucfirst($word),
        'subtitle'          => $faker->sentence,
        'post_image'        => $images[mt_rand(0, 3)],
        'meta_description'  => "Meta for $word",
        'reverse_direction' => false,
    ];
});
