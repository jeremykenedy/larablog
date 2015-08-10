<?php
// return [
//   'title' => 'My Blog',
//   'posts_per_page' => 5,
//   'uploads' => [
//     'storage' => 'local',
//     'webpath' => '/uploads',
//   ],
// ];

// return [
//   'title' => 'LaraBlog',
//   'posts_per_page' => 5,
//   'uploads' => [
//     'storage' => 's3',
//     'webpath' => 'https://s3-us-west-2.amazonaws.com/consultjeremy.com',
//   ],
// ];

return [
	'name' => "LaraBlog",
	'title' => "Laravel 5.1 Blog",
	'subtitle' => 'A clean blog written in Laravel 5.1',
	'description' => 'This is my meta description',
	'author' => 'Jeremy Kenedy',
	'page_image' => 'backgrounds/home-bg.jpg',
	'posts_per_page' => 10,
	'uploads' => [
		//'storage' => 'local',
		//'webpath' => '/uploads/',
		'storage' => 's3',
		'webpath' => 'https://s3-us-west-2.amazonaws.com/consultjeremy.com',
	],
];
