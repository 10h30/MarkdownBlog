<form {{ $attributes->except('method')->merge(["class" => "max-w-xl space-y-6", "method" => $attributes->get('method') === 'GET' ? 'GET' : 'POST' ]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
