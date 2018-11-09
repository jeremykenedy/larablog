<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThemeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermission('perms.admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->name);
        // unique:table     ,column , except    , idColumn
        // unique:themes    ,name   , id        , ' . $this->id,

        return [
            // 'name'   => 'required|min:3|max:50|unique:themes,name',
            // 'link'   => 'required|min:3|max:255|unique:themes,link',
            // 'title'  => 'required|max:255|unique:posts,id,'.$this->id,
            // 'tag'    => 'required|max:255|string|unique:tags,tag,'.$this->route('tag'),
            'name'   => 'required|min:3|max:50|unique:themes,id,name,'.$this->id,
            'link'   => 'required|min:3|max:255|unique:themes,id,link,'.$this->id,
            'notes'  => 'max:500',
            'status' => 'required',
        ];
    }
}
