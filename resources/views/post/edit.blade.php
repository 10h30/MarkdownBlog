<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post: ') }} {{ $post->title }}
        </h1>
    </x-slot>
   
    <div class="max-w-3xl mx-auto px-4  py-12">

    <!-- Form Card -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
      <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Blog Post</h1>

      <!-- Blog Post Form -->
      <form action="/post/{{ $post->id }}" method="POST">
        @csrf
        @method('PATCH')
        <!-- Title Input -->
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" id="title" name="title" value="{{ $post->title }}" required
            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            placeholder="Enter your blog post title">
          <x-form-error name="title"></x-form-error>
        </div>

        <!-- Content Input -->
        <div class="mb-4">
          <label for="content" class="block text-gray-700 font-medium">Content</label>
          <textarea id="content" name="content" required rows="6"
            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            placeholder="Write your blog content here...">{{ $post->content }} </textarea>
            <x-form-error name="content"></x-form-error>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700">
            Update Post
          </button>
        </div>

      </form>
    </div>

      <!-- Back Button -->
      <div class="mb-6 mt-6">
        <a href="/blog" class="text-blue-600 hover:underline flex items-center">
          ⬅ Back to Blog
        </a>
      </div>

      <form action="/post/{{ $post->id }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <a href="javascript:void(0)" onclick="if(confirm('Are you sure you want to delete this post?')){this.closest('form').submit()}">
            Delete Post
        </a>
    </form>   
  </div>
</x-app-layout>
