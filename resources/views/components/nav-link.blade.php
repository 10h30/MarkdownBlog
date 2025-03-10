@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex text-md underline transition duration-150 ease-in-out'
            : 'inline-flex text-md transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
