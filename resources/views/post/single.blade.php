<x-app-layout>
    <x-slot name="heading">
          {{ $post->title }}
    </x-slot>
   
     
    <div class="{{-- max-w-3xl mx-auto px-4 py-12 --}}">
  
       <!-- Back Button -->
       <div class="mb-6 flex justify-between">
        {{-- <a href="/blog" class="text-blue-600 hover:underline flex items-center">
          ⬅ Back to Blog
        </a> --}}

        @if(auth()->id() === $post->user_id) 
        <!-- Show Edit Button Only for Post Author -->
        <a href="{{ route('post.edit', $post->id) }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
           Edit
        </a>
        @endif
      </div>

      <!-- Blog Post -->
      <article class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        
        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
  
        <!-- Post Meta (Author & Date) -->
        <div class="text-gray-500 text-sm mb-6 flex justify-between">
          <span>Author: {{ $post->user->name }}</span>
          <span>Published: {{ $post->created_at }}</span>
        </div>
  
        <!-- Post Content -->
        <div class="text-gray-700 leading-relaxed space-y-4">
         {{--  {!! nl2br(e($post->content)) !!} --}}
          {!! $content !!}

        </div>
        
      </article>

      

    </div>
</x-app-layout>
