<?php

namespace adabay\TwillContactForms\Twill\Capsules\ContactForms\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use adabay\TwillContactForms\Twill\Capsules\ContactForms\Models\ContactForm;

class ContactFormRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleRevisions;

    public function __construct(ContactForm $model)
    {
        $this->model = $model;
    }
}
