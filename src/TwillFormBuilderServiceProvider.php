<?php

namespace adabay\TwillContactForms;

use A17\Twill\TwillPackageServiceProvider;
use Illuminate\Support\Facades\Log;

class TwillFormBuilderServiceProvider extends TwillPackageServiceProvider
{
    public function boot(): void
    {
        parent::boot();$this->loadViewsFrom(__DIR__ . '/../resources/views/site/blocks', 'twill-contact-forms');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/twill-contact-forms'),
        ]);

        $this->registerBlocksDirectory(__DIR__.'/../resources/views/twill/blocks', "twill-contact-forms");
    }
}
