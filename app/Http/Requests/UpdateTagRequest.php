<?php

namespace App\Http\Requests;

class UpdateTagRequest extends StoreTagRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermission('perms.moderator');
    }
}
