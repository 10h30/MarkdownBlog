<x-app-layout>
    <x-slot:heading>Blog Page</x-slot:heading>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h1>
    </x-slot>
    
    <div class="max-w-screen-xl mx-auto">
        @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @auth
        <div class="flex justify-end mb-6">
            <a href="/post/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
              Create New Post
            </a>
          </div>
        @endauth

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts as $post )
         
            <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 flex flex-col gap-4">
              <!-- Post Title -->
              <h2 class="text-xl font-bold mb-2">
                  <a href="{{ route('post.show', $post->id) }}" class="text-blue-600 hover:underline">
                      {{ $post->title }}
                  </a>
              </h2>
              
              <!-- Post Excerpt (First 50 characters) -->
              <div class="text-gray-600 text-base">
                <p>{!! nl2br(e(Str::limit($post->content))) !!}</p>
              </div>
  
               <!-- Read More Button -->
              <div class="mt-4">
                  <a href="{{ route('post.show', $post->id) }}" 
                  class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
                  Read More →
                  </a>
              </div>

              <div class="text-gray-500 text-sm flex flex-col">
                {{-- <span>Author: {{ $post->user->name }}</span> --}}
                <span>Date: {{ $post->created_at }}</span>
              </div>
            </div>
          @endforeach
          
    
        </div>
      </div>
</x-app-layout>
