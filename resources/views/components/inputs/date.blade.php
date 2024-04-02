@php
    $key = $attributes['key'] ?? $attributes->thatStartWith('wire:model')->first();
@endphp

<div class="input-group mb-3">
    <input
        {{ $attributes }}
        type="date"
        name="{{ $key }}"
        class="form-control @errorClass($key)"
        value="{{ old($key) }}"
        placeholder="{{ trans("validation.attributes.$key") }}"
    />

    <x-inputs.error field="{{ $key }}" />
</div>
