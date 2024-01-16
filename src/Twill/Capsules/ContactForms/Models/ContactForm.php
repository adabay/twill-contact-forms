<?php

namespace adabay\TwillContactForms\Twill\Capsules\ContactForms\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;

class ContactForm extends Model
{
    use HasBlocks, HasTranslation, HasRevisions, HasRelated;

    protected $fillable = [
        'published',
        'title',
        'description',
        'successPage'
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'active',
        'successPage'
    ];
}
