@props(['label', 'name'])

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
    <textarea {{ $attributes($defaults) }}>{{ old($name) }} </textarea>
</x-form-field>
