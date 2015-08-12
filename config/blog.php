<?php
return [
	'name' => "LaraBlog",
	'title' => "Laravel 5.1 Blog",
    'subtitle' => 'A clean blog written in Laravel 5.1',
    'description' => 'This is my meta description',
	'author' => 'Jeremy Kenedy',
	'page_image' => 'backgrounds/home-bg.jpg',
    'posts_per_page' => 10,
    'rss_size' => 25,
    //'contact_email' => config('blog.contact_email'),
    'contact_email' => env('MAIL_FROM'),
	'uploads' => [
		'storage'   => env('UPLOADS_ENVIRONMENT'),
		'webpath'   => env('UPLOADS_WEBPATH'),
	],
];