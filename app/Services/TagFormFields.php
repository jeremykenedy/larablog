<?php

namespace App\Services;

use App\Services\PostTemplates;

class TagFormFields
{
    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    private static $_fieldList = [
        'tag'               => '',
        'title'             => '',
        'subtitle'          => '',
        'meta_description'  => '',
        'post_image'        => '',
        'layout'            => 'blog.roll-layouts.home',
        'reverse_direction' => 0,
    ];

    /**
     * Get the tag form fields data.
     *
     * @return array
     */
    public static function fields()
    {
        return self::$_fieldList;
    }

    public static function formData()
    {
        $data                   = self::fields();
        $postTemplates          = PostTemplates::list('roll');
        $data['postTemplates']  = $postTemplates;

        return $data;
    }

}
