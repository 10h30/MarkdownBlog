@props(['slug'])

<h2 class="text-xl font-bold mb-2">
    <a href="{{ route('post.show', $slug) }}" class="text-blue-600 hover:underline">
        {{ $slot }}
    </a>
</h2>