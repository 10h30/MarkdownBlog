<x-app-layout>
    <x-slot:heading>Blog Page</x-slot:heading>
   
        <h1 class="font-semibold text-4xl mb-10 text-black text-center">
            @if (request()->routeIs('blog') || request()->routeIs('home'))
                {{ __('Blog') }}
            @elseif (request()->routeIs('category'))
                {{ $category->name }}
            @endif
        </h1>

    
    <div class="max-w-screen-xl mx-auto">
        @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <!-- Create new post button for auth user -->
        <x-button-create-post />

        <!-- Main Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($posts as $post )
            <x-post-entry :post="$post" />
        @endforeach
        </div>
          <!-- Pagination Links -->
          <div class="mt-10">{{ $posts->links() }}</div>
      </div>
</x-app-layout>
