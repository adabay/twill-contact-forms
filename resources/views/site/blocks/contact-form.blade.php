@php
    /** @var \A17\Twill\Models\Block $block */

    $contactFormIds = $block->browserIds('contactForm');
    if (count($contactFormIds) > 0) {
        /** @var \adabay\TwillContactForms\Twill\Capsules\ContactForms\Models\ContactForm $contactForm */
        $contactForm = \adabay\TwillContactForms\Twill\Capsules\ContactForms\Models\ContactForm::query()->find($contactFormIds[0]);
    }
@endphp

@isset($contactForm)
    <form>
        <p>{{ $contactForm->getAttribute('description') }}</p>
        {!! $contactForm->renderNamedBlocks("contactFormFields") !!}
    </form>
@endisset