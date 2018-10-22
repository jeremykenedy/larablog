<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PostAuthors;
use App\Services\PostTemplates;
use Carbon\Carbon;

class PostFormFields
{
    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'title'             => '',
        'subtitle'          => '',
        'post_image'        => '',
        'content'           => '',
        'meta_description'  => '',
        'is_draft'          => '1',
        'author'            => '',
        'slug'              => '',
        'publish_date'      => '',
        'publish_time'      => '',
        'layout'            => 'blog.post',
        'tags'              => [],
    ];

    /**
     * Create a new job instance.
     *
     * @param int $id
     *
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fields = $this->fieldList;

        if ($this->id) {
            $fields = $this->fieldsFromModel($this->id, $fields);
            $fields['publish_time'] = $fields['publish_date']->format('g:i A');
            $fields['publish_date'] = $fields['publish_date']->format('M-d-Y');
        } else {
            $when = Carbon::now()->addHour();
            $fields['publish_date'] = $when->format('M-j-Y');
            $fields['publish_time'] = $when->format('g:i A');
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        // Get the additional data for the form fields
        $postFormFieldData = $this->postFormFieldData();

        return array_merge(
            $fields, [
                'allTags' => Tag::pluck('tag')->all(),
            ],
            $postFormFieldData
        );
    }

    /**
     * Return the field values from the model.
     *
     * @param int   $id
     * @param array $fields
     *
     * @return array
     */
    protected function fieldsFromModel($id, array $fields)
    {
        $page = Post::findOrFail($id);

        $fieldNames = array_keys(array_except($fields, ['tags']));

        $fields = [
            'id' => $id,
        ];
        foreach ($fieldNames as $field) {
            $fields[$field] = $page->{$field};
        }

        $fields['tags'] = $page->tags()->pluck('tag')->all();

        return $fields;
    }

    /**
     * Get the additonal post form fields data.
     *
     * @return array
     */
    protected function postFormFieldData()
    {
        $allAvailableAuthors = PostAuthors::all();
        $postTemplates = PostTemplates::list();

        return [
            'allAvailableAuthors'   => $allAvailableAuthors,
            'postTemplates'         => $postTemplates,
        ];
    }
}
