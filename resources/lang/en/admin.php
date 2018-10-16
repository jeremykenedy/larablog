<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lara(b)log Admin language lines
    |--------------------------------------------------------------------------
    |
    */

    'navbar' => [

    ],

    'drawer-nav' => [
        'dashboard'     => 'Dashboard',
        'posts'         => 'Posts',
        'tags'          => 'Tags',
        'file-manager'  => 'Files',
        'users'         => 'Users',
        'roles'         => 'Roles',
        'phpinfo'       => 'PHP Info',
        'settings'      => 'Settings',
    ],

    'footer' => [

        'nav' => [
            'github'  => 'GitHub',
            'license' => 'License',
        ],

        'copyright' => '&copy; 2018 | Developed with Love <i class="fa fa-heart text-danger"></i> by Jeremy Kenedy',
    ],

    'access_levels' => [
        'roles'     => [
            'super-admin'   => 'Super Admin',
            'admin'         => 'Admin',
            'moderator'     => 'Moderator',
            'writer'        => 'Writer',
            'user'          => 'User',
        ],
        'permissions' => [
            'view-users'    => 'View Users',
            'create-users'  => 'Create Users',
            'edit-users'    => 'Edit Users',
            'delete-users'  => 'Delete Users',
        ],
    ],

    'dashboard' => [
        'title'                     => 'Dashboard',
        'welcome-card-title'        => 'Hi :username, Welcome to Lara(b)og2',
        'welcome-card-sub-title'    => 'Lara(b)log An opensource blog platform built on Laravel and Bootstrap 4.',
        'welcome-access'            => 'Your role level: ',
        'access-level-string'       => '{0} You have no access.|{1} You have access to level:|[2,*] You have access to levels:',
        'welcome-card-footer'       => '<em>Thank you</em> for checking this project out. <strong>Please remember to star it!</strong>',
    ],

    'posts' => [
        'pages' => [
            'index' => [
                'title' => 'Posts',
            ],
        ],
        'table' => [
            'title' => 'Blog Posts',
            'titles' => [
                'published' => 'Published',
                'title'     => 'Title',
                'subtitle'  => 'SubTitle',
                'actions'   => 'Actions',
            ],
        ],
    ],

    'buttons' => [
        'edit' => 'Edit',
        'view' => 'View',
    ],

];
