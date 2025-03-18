@props(['label', 'name', 'value' => ''])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-white/10 border border-grey px-5 py-4 w-full',
        'value' => old($name),
        'rows' => '20'
    ];
@endphp

<x-form-field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{ old($name, $value) }}</textarea>
</x-form-field>
