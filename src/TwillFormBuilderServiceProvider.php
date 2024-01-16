<?php

namespace adabay\TwillContactForms;

use A17\Twill\TwillPackageServiceProvider;
use Illuminate\Support\Facades\Log;

class TwillFormBuilderServiceProvider extends TwillPackageServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adabay');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/adabay/twill-contact-forms'),
        ]);
    }
}
