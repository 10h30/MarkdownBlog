<x-app-layout>
    <x-slot name="heading">
          {{ $post->title }}
    </x-slot>
   
     
    <div class="{{-- max-w-3xl mx-auto px-4 py-12 --}}">
      @if (session('success'))
      <div class="bg-green-500 text-white p-3 rounded mb-4">
          {{ session('success') }}
      </div>
      @endif
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
      <article class="bg-white border p-10 border-gray-200 rounded-lg shadow-md flex flex-col gap-y-5">
        
        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
  
        <x-post-category :post="$post" />


        <x-post-meta :post="$post" />

  
        <!-- Post Content -->
        <div class="text-gray-700 leading-relaxed space-y-4">
         {{--  {!! nl2br(e($post->content)) !!} --}}
          {!! $content !!}

        </div>
        
      </article>

      <!-- Post Comment -->
      <div>
        @if ($post->comments->count() > 0)
          <h2 class="text-3xl mt-20">{{ $post->comments->count()  }} Comments</h2>
           @include('post.comment-display', ['comments' => $post->comments->whereNull('parent_id')])
        @else
            <h2 class="text-3xl mt-20">No comments yet</h2>
        @endif
        {{-- @include('post.single-post-comment' , ['post' => $post ]); --}}
      </div>

      @include('post.comment-form', ['post' => $post])
    
    </div>
</x-app-layout>
 