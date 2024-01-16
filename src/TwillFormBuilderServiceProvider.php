<?php

namespace adabay\TwillContactForms;

use A17\Twill\TwillPackageServiceProvider;
use Illuminate\Support\Facades\Log;

class TwillFormBuilderServiceProvider extends TwillPackageServiceProvider
{
    public function boot(): void
    {
        parent::boot();
    }
}
