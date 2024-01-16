<?php

namespace adabay\TwillContactForms\Twill\Capsules\ContactForms\Http\Requests;

use A17\Twill\Http\Requests\Admin\Request;

class ContactFormRequest extends Request
{
    public function rulesForCreate()
    {
        return [];
    }

    public function rulesForUpdate()
    {
        return [];
    }
}
