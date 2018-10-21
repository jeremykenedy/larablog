<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lara(b)log forms language lines
    |--------------------------------------------------------------------------
    |
    */

    'edit-post' => [
        'id-title'  => 'Post id: :id',
        'title'     => 'Editing Post',
        'labels'    => [
            'post-title'            => 'Post Title',
            'post-subtitle'         => 'Post Subtitle',
            'post-post_image'       => 'Post Image',
            'post-slug'             => 'Post Slug',
            'post-content'          => 'Post Content',
            'post-publish_date'     => 'Publish Date',
            'post-publish_time'     => 'Publish Time',
            'post-is_draft'         => 'Is Draft?',
            'post-tags'             => 'Post Tags',
            'post-layout'           => 'Post Layout',
            'post-author'           => 'Post Author',
            'post-meta_description' => 'Meta Description',
        ],
        'buttons' => [
            'save-finished' => '<i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Save',
            'save-continue' => '<i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Save',
            'delete'        => '<i class="fa fa-times-circle fa-fw" aria-hidden="true"></i> Delete',
            'choose-image'  => '<i class="nc-icon nc-album-2" aria-hidden="true"></i> Choose Post Image',
        ],
    ],

    'create-post' => [
        'title'     => 'Creating New Post',
        'badge'     => 'Not Saved',
    ],

];
