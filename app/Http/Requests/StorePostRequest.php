<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermission('perms.writer');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'             => 'required|max:255|unique:posts,id,'.$this->id,
            'subtitle'          => 'required',
            'content'           => 'required',
            'post_image'        => 'required',
            'meta_description'  => 'required|max:255',
            'is_draft'          => 'nullable',
            'author'            => 'required',
            'slug'              => 'required|unique:posts,id,'.$this->id,
            'publish_date'      => 'required',
            'publish_time'      => 'required',
            'layout'            => 'required',
        ];
    }

    /**
     * Return the fields and values to create a new post.
     *
     * @return array
     */
    public function postFillData()
    {
        $published_at = new Carbon(
            $this->publish_date.' '.$this->publish_time
        );

        return [
            'title'             => $this->title,
            'subtitle'          => $this->subtitle,
            'post_image'        => $this->post_image,
            'content_raw'       => $this->get('content'),
            'meta_description'  => $this->meta_description,
            'is_draft'          => (bool) $this->is_draft,
            'author'            => $this->author,
            'slug'              => $this->slug,
            'published_at'      => $published_at,
            'layout'            => $this->layout,
        ];
    }
}
