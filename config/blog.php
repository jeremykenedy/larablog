<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Front End Application Name.
    |--------------------------------------------------------------------------
    */
    'name' => env('BLOG_APP_NAME', config('app.name')),

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML attribute `title`.
    |--------------------------------------------------------------------------
    */
    'title' => env('BLOG_DEFAULT_TITLE', 'Lara(b)log2'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML accessible variable `subtitle`.
    |--------------------------------------------------------------------------
    */
    'subtitle' => env('BLOG_DEFAULT_SUBTITLE', 'An open source blog platform'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML attribute `subtitle`.
    |--------------------------------------------------------------------------
    */
    'description' => env('BLOG_DEFAULT_DESCRIPTION', 'Larablog 2 is an open source blog built on Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML attribute `author`.
    |--------------------------------------------------------------------------
    */
    'author' => env('BLOG_DEFAULT_AUTHOR', 'Jeremy Kenedy'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML accessible variable `subtitle`.
    |--------------------------------------------------------------------------
    */
    'post_image' => env('BLOG_DEFAULT_IMAGE', '/backgrounds/default-home-bg.jpg'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for pagination of returning posts in results.
    |--------------------------------------------------------------------------
    */
    'pages_per_page' => env('BLOG_DEFAULT_PAGES_PER_PAGE', 10),

    /*
    |--------------------------------------------------------------------------
    | Default entry for pagination direction.
    |--------------------------------------------------------------------------
    */
    'reverse_pagination_direction' => env('BLOG_DEFAULT_REVERSE_PAGINATION_DIRECTION', false),

    /*
    |--------------------------------------------------------------------------
    | Default entry for the RSS size feed of the blog posts.
    |--------------------------------------------------------------------------
    */
    'rss_size' => env('BLOG_DEFAULT_RSS_SIZE', 25),

    /*
    |--------------------------------------------------------------------------
    | Default entry for the blogs contact email address.
    |--------------------------------------------------------------------------
    */
    'contact_email' => env('BLOG_DEFAULT_CONTACT_EMAIL', env('MAIL_FROM_ADDRESS')),

    /*
    |--------------------------------------------------------------------------
    | Default entry for where the blog uploads are going to go/live.
    |--------------------------------------------------------------------------
    */
    'uploads' => [
        'storage'   => env('BLOG_UPLOADS_ENVIRONMENT'),
        'webpath'   => env('BLOG_UPLOADS_WEBPATH'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Social Media Links - Entering into .enf file activate/show icons.
    |--------------------------------------------------------------------------
    */
    'sm' => [
        'twitter_url'       => env('BLOG_SM_URL_TWITTER', null),
        'facebook_url'      => env('BLOG_SM_URL_FACEBOOK', null),
        'linkedin_url'      => env('BLOG_SM_URL_LINKEDIN', null),
        'googleplus_url'    => env('BLOG_SM_URL_GOOGLEPLUS', null),
        'github_url'        => env('BLOG_SM_URL_GITHUB', null),
    ],

];


