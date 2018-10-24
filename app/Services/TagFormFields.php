<?php

namespace App\Services;

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

    /**
     * Get data needed for tag forms.
     *
     * @param App/Models/Tag $tag
     *
     * @return array
     */
    public static function formData($tag = null)
    {
        $data = self::fields();
        if ($tag) {
            $data = $tag->toArray();
        }
        $postTemplates = PostTemplates::list('roll');
        $data['postTemplates'] = $postTemplates;

        return $data;
    }
}
