@props(['label', 'name'])

<div class="mb-4">
    @if ($label)
        <x-form-label :$name :$label />
    @endif

        {{ $slot }}

        <x-form-input-error :messages="$errors->first($name)" />
  
</div>
