<x-app-layout>
    <x-slot:heading>Blog Page</x-slot:heading>
   
        
        @if (request()->routeIs('blog') || request()->routeIs('home'))
            <h1 class="font-semibold text-4xl mb-5 text-black text-center">
                    {{ __('Blog') }}
            </h1>
            @elseif (request()->routeIs('category.show'))
            <h1 class="font-semibold text-4xl mb-5 text-black text-center">
               {{ $category->name }}
            </h1>
            <div class="text-center mb-10"> {{ $category->description }}</div>
            @auth
                <p class="text-xs text-center"><a href="{{ route('category.edit', $category->id) }}">Edit Category</a></p>
            @endauth
        @endif
    
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
