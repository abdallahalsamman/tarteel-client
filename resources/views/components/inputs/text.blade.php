@php
    $key = $attributes->thatStartWith('wire:model')->first();
@endphp

<div class="input-group mb-3">
    <input
        {{ $attributes }}
        type="text"
        name="{{ $key }}"
        class="form-control @errorClass($key)"
        placeholder="{{ trans("validation.attributes.$key") }}"
    >

    <x-inputs.fa fontAwesome="fa-edit" />

    <x-inputs.error field="{{ $key }}" />
</div>
