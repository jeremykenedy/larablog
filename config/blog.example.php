<?php
return [
	'name' => '',
	'title' => '',
    'subtitle' => '',
    'description' => '',
	'author' => '',
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