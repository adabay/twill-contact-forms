@twillBlockGroup('adabay-contact-form')
@twillBlockTitle('Input Field')
@twillBlockIcon('location')

@php
    $inputTypeOptions = [
        [
            'value' => 'text_plain',
            'label' => 'Text (einfach)'
        ],
        [
            'value' => 'text_area',
            'label' => 'Text (lang)'
        ],
        [
            'value' => 'email',
            'label' => 'Text (E-Mail)'
        ],
        [
            'value' => 'phone',
            'label' => 'Text (Telefonnummer)'
        ],
    ];
@endphp

<x-twill::select
        name="inputType"
        label="Feldtyp"
        placeholder="Wähle einen Feldtyp"
        :options="$inputTypeOptions"
/>

<x-twill::input
        name="label"
        label="Label"
        :translated="true"
/>

<x-twill::input
        name="placeholder"
        label="Placeholder"
        :translated="true"
/>

<x-twill::input
        name="id"
        label="Identifier"
        :translated="false"
/>

@php
    $widthOptions = [
        [
            'value' => '50',
            'label' => '50%'
        ],
        [
            'value' => '100',
            'label' => '100%'
        ],
    ];
@endphp

<x-twill::radios
        name="width"
        label="Breite (in %)"
        default="100"
        :inline="true"
        :options="$widthOptions"
/>

<x-twill::checkbox
        name="required"
        label="Ist eine Eingabe erforderlich?"
        :translated="false"
/>