@props(['name', 'label'])

<label for="{{ $name }}" {{ $attributes->merge(['class' => 'block font-medium text-md mb-2 text-gray-700']) }}>
    {{ $label }}
</label>