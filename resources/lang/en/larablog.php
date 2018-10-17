<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lara(b)log language lines
    |--------------------------------------------------------------------------
    |
    */

    'nav' => [
        'menu'      => 'Menu',
        'home'      => 'Home',
        'about'     => 'About',
        'authors'   => 'Authors',
        'contact'   => 'Contact',
        'register'  => 'Register',
        'login'     => 'Login',
        'admin'     => 'Admin',
        'logout'    => 'Logout',
    ],

    'blogroll' => [
        'postedBy'  => 'Posted by <a href=":url">:author</a> on :date',
        'tags'      => 'Tags: ',
    ],

    'pagination' => [
        'nextPost'  => 'Older Posts',
        'prevPost'  => 'Newer Posts',
        'noposts'   => 'No Posts',
    ],

    'home' => [
        'title'         => 'Welcome to Larablog',
        'description'   => 'Larablog is an open source blog built on Laravel and Bootstrap',
    ],

    'authors' => [
        'title'         => 'Authors',
        'subtitle'      => 'The people behind the goods.',
        'description'   => 'A list of authors with published posts.'
    ],

    'author' => [
        'title'         => ':author',
        'subtitle'      => '{0} no posts|{1} :postcount post total|[2,*] :postcount total posts',
        'description'   => 'All published posts by :author',
    ],

    'footer' => [
        'copyright' => '&copy; Lara(b)log 2018 | An <a href="https://github.com/jeremykenedy/larablog" target="_blank" class="text-success">opensource</a> blog platform<br /> Developed with Love <i class="fa fa-heart text-danger"></i> by <a href="https://github.com/jeremykenedy" class="text-muted" target="_blank">Jeremy Kenedy</a>',
    ],

];
