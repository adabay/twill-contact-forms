<div style="width: {{ $block->input("width") }}%; display: flex; flex-direction: column">
    <label for="_twill_form_input_{{ $block->input("id") }}">{{ $block->translatedInput("label") }}</label>
    <input id="_twill_form_input_{{ $block->input("id") }}" type="text" placeholder="{{ $block->translatedInput("placeholder") }}" name="{{ $block->input("id") }}" {{ $block->checkbox("required") ? "required" : "" }} />
</div>