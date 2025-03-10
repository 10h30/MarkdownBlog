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
      <article class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        
        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
  
         <!-- Post Categories -->
         @if($post->categories->count() > 0)
         <div class="flex gap-2 item-center mb-2">
           @foreach($post->categories as $index => $category)
               <a href="{{-- {{ route('category.posts', $category->id) }} --}}" 
                  class="bg-blue-300 text-blue-900 text-xs px-2 py-1 rounded-full mr-2 mb-2 hover:bg-blue-200 transition"> 
                   {{ $category->name }}
               </a>
           @endforeach
         </div>
       @endif

       <!-- Post Meta -->
       <div class="text-gray-500 text-sm mb-6 flex gap-4">
        
        <div class="flex gap-2 item-center">
          <span>
            <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z"/></svg>
          </span>
          <span>Posted: {{ $post->created_at->format('Y/m/d') }}</span>
        </div>
        @if ($post->updated_at->format('Y/m/d') != $post->created_at->format('Y/m/d'))
        <div class="flex gap-2 item-center">
          <span>
            <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160 352 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l111.5 0c0 0 0 0 0 0l.4 0c17.7 0 32-14.3 32-32l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1L16 432c0 17.7 14.3 32 32 32s32-14.3 32-32l0-35.1 17.6 17.5c0 0 0 0 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.8c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352l34.4 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L48.4 288c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z"/></svg>
          </span>
          <span>Updated: {{ $post->updated_at->format('Y/m/d') }}</span>
        </div>
        @endif
      </div>
  
        <!-- Post Content -->
        <div class="text-gray-700 leading-relaxed space-y-4">
         {{--  {!! nl2br(e($post->content)) !!} --}}
          {!! $content !!}

        </div>
        
      </article>

      

    </div>
</x-app-layout>
