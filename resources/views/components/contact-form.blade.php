@php
    /** @var \A17\Twill\Models\Behaviors\HasBlocks $item */
    $item;
@endphp

@foreach($item->blocks() as $formInputBlock)
    {{ $formInputBlock }}
@endforeach