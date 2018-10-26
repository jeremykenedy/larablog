<?php

namespace App\Traits;

use Illuminate\Support\Facades\Input;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait
{
    /**
     * Use Google ReCaptcha Service
     *
     * @return     boolean  ( description_of_the_return_value )
     */
    public function captchaCheck()
    {
        $response   = Input::get('g-recaptcha-response');
        $remoteip   = $_SERVER['REMOTE_ADDR'];
        $secret     = config('blog.services.reCaptchSecret');
        $recaptcha  = new ReCaptcha($secret);
        $resp       = $recaptcha->verify($response, $remoteip);

        if ($resp->isSuccess()) {
            return true;
        }

        return false;
    }
}
