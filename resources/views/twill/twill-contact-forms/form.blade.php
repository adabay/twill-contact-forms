@extends('twill::layouts.form')

@section('contentFields')

    @formField('browser', [
    'moduleName' => 'pages',
    'name' => 'successPage',
    'label' => 'Redirect-Ziel bei Erfolg',
    'max' => 1,
    'translated' => true
    ])

    @formField('block_editor', ['group' => 'adabay-contact-form'])

@stop