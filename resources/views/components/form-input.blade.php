@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-white/10 border border-grey px-5 py-4 w-full',
        'value' => old($name)
    ];
@endphp

<x-form-field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-form-field>
