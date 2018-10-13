<?php

return [
    'feeds' => [
        'blog' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => env('BLOG_RSS_FEED_URL', '/blog.rss'),

            'title' => env('BLOG_RSS_FEED_TITLE', 'My Blog feed'),

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::feed',
        ],
    ],
];
