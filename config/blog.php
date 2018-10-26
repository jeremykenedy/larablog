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
    | Default entry for pagination of returning posts in results.
    |--------------------------------------------------------------------------
    */
    'posts_per_page' => env('BLOG_DEFAULT_PAGES_PER_PAGE', 10),

    /*
    |--------------------------------------------------------------------------
    | Default entry for pagination direction.
    |--------------------------------------------------------------------------
    */
    'reverse_pagination_direction' => env('BLOG_DEFAULT_REVERSE_PAGINATION_DIRECTION', false),

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

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */
    'services' => [
        'disqusKey'         => env('BLOG_DISQUSSHORTNAME', null),
        'googleAnalyticsID' => env('BLOG_GOOGLEANALYTICSID', null),
        'reCaptchStatus'    => env('ENABLE_RECAPTCHA', false),
        'reCaptchSite'      => env('RECAPTCHA_SITE', 'YOURGOOGLECAPTCHAsitekeyHERE'),
        'reCaptchSecret'    => env('RECAPTCHA_SECRET', 'YOURGOOGLECAPTCHAsecretHERE'),
        'reCaptchCDN'       => env('RECAPTCHA_CDN', 'https://www.google.com/recaptcha/api.js'),


    ],

    /*
    |--------------------------------------------------------------------------
    | Default entry for blog HTML accessible variable `post_image`.
    |--------------------------------------------------------------------------
    */
    'post_image' => env('BLOG_DEFAULT_IMAGE', '/backgrounds/default-post-bg.jpg'),

    /*
    |--------------------------------------------------------------------------
    | Other Images
    |--------------------------------------------------------------------------
    */
    'home_page_image'    => env('BLOG_HOME_IMAGE', '/backgrounds/default-home-bg.jpg'),
    'authors_page_image' => env('BLOG_AUTHORS_IMAGE', '/backgrounds/default-authors-bg.jpg'),
    'author_page_image'  => env('BLOG_AUTHOR_IMAGE', '/backgrounds/default-authors-bg.jpg'),
    'contact_page_image' => env('BLOG_CONTACT_IMAGE', '/backgrounds/default-authors-bg.jpg'),

];
