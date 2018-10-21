<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lara(b)log Admin language lines
    |--------------------------------------------------------------------------
    |
    */

    'navbar' => [
        'title' => 'Admin Menu',
    ],

    'drawer-nav' => [
        'dashboard'     => 'Dashboard',
        'posts'         => 'Posts',
        'tags'          => 'Tags',
        'file-manager'  => 'Files',
        'users'         => 'Users',
        'roles'         => 'Roles',
        'phpinfo'       => 'PHP Info',
        'activity'      => 'Activity',
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
        'header'                    => 'Welcome!',
        'welcome-card-title'        => 'Hi :username, Welcome to Lara(b)og2',
        'welcome-card-sub-title'    => 'Lara(b)log An opensource blog platform built on Laravel and Bootstrap 4.',
        'welcome-access'            => 'Your role level: ',
        'access-level-string'       => '{0} You have no access.|{1} You have access to level:|[2,*] You have access to levels:',
        'welcome-card-footer'       => '<em>Thank you</em> for checking this project out. <strong>Please remember to star it!</strong>',
        'permissions-string'        => 'You have permissions:',
    ],

    'posts' => [
        'pages' => [
            'index' => [
                'title'     => 'Posts',
                'badge'     => 'Showing :per of :total',
                'header'    => 'Showing Blog Posts',
            ],
            'edit' => [
                'title'     => 'Editing Post Id: :id',
                'header'    => 'Edit Blog Post',
            ],
            'create' => [
                'title'     => 'Create New Post',
                'header'    => 'New Blog Post',
            ],
        ],
        'table' => [
            'title'  => 'Blog Posts',
            'titles' => [
                'id'        => 'Id',
                'published' => 'Published',
                'title'     => 'Title',
                'subtitle'  => 'SubTitle',
                'author'    => 'Author',
                'actions'   => 'Actions',
            ],
        ],
    ],

    'buttons' => [
        'edit'      => 'Edit',
        'view'      => 'View',
        'delete'    => 'Delete',
        'create'    => 'Create Post',
    ],

    'modals' => [
        'delete-post' => [
            'close'     => 'Close',
            'title'     => 'Confirm Delete',
            'message'   => 'Delete this post?',
            'cancel'    => 'Cancel',
            'confirm'   => 'Confirm Delete',
        ],
        'save-post' => [
            'close'     => 'Close',
            'title'     => 'Confirm Save',
            'message'   => 'Save post change?',
            'cancel'    => 'Cancel',
            'confirm'   => 'Confirm Save',
        ],
    ],

    'loader' => [
        'message' => 'loading',
    ],

    'user_pages' => [
        'index'     => [
            'header' => 'Showing Users',
        ],
        'show'      => [
            'header' => 'Showing User',
        ],
        'edit'      => [
            'header' => 'Editing User',
        ],
        'create'    => [
            'header' => 'Creating User',
        ],
    ],

    'file_manager' => [
        'index'     => [
            'title'     => 'File Manager',
            'desc'      => '',
            'header'    => 'File Manager',
        ],
    ],

];
