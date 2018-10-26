<?php

namespace App\Http\Requests;

use App\Traits\CaptchaTrait;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    use CaptchaTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $captchaRequiredPlug = '';

        if (config('blog.services.reCaptchStatus')) {
            $captchaRequiredPlug = 'required';  // Rule
            $this->captchaCheck();              // Check
        }

        return [
            'firstname'             => 'required|max:255|string',
            'lastname'              => 'max:255|string',
            'email'                 => 'required|max:255|email',
            'phone'                 => 'numeric|nullable',
            'message'               => 'required|max:500|string',
            'g-recaptcha-response'  => $captchaRequiredPlug,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required' => trans('forms.contact.validation.captcha'),
        ];
    }

}
