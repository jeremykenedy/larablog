<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
            'tag'               => 'required|max:255|string|unique:tags,tag,'.$this->route('tag'),
            'title'             => 'string|nullable',
            'subtitle'          => 'string|nullable',
            'meta_description'  => 'string|nullable',
            'post_image'        => 'required|string',
            'layout'            => 'required|string',
            'reverse_direction' => '',
        ];
    }
}
