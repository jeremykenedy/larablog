<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

class PostFormFields
{
    /**
     * List of fields and default value for each field.
     *
     * @var array
     */
    protected $fieldList = [
        'title'            => '',
        'subtitle'         => '',
        'page_image'       => '',
        'content'          => '',
        'meta_description' => '',
        'is_draft'         => '0',
        'publish_date'     => '',
        'publish_time'     => '',
        'layout'           => 'front-end.pages.page-dynamic',
        'tags'             => [],
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
        } else {
            $when = Carbon::now()->addHour();
            $fields['publish_date'] = $when->format('M-j-Y');
            $fields['publish_time'] = $when->format('g:i A');
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        return array_merge(
            $fields,
            ['allTags' => Tag::pluck('tag')->all()]
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

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $page->{$field};
        }

        $fields['tags'] = $page->tags()->pluck('tag')->all();

        return $fields;
    }
}
