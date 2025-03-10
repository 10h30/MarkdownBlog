<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Post') }}
        </h1>
    </x-slot>
   
    <div class="max-w-3xl mx-auto px-4  py-12">

    <!-- Form Card -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
      <h1 class="text-2xl font-bold text-gray-900 mb-6">Create New Blog Post</h1>

      <!-- Blog Post Form -->
      <form action="/post/create" method="POST">
        @csrf
        <!-- Title Input -->
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" id="title" name="title" value="{{ old('title') }}" required
            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            placeholder="Enter your blog post title">
          <x-form-error name="title"></x-form-error>
        </div>

         <!-- Categories Section -->
         <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2">Categories</label>
          
          <!-- Existing Categories - With Empty State -->
          @if(count($categories) > 0)
              <div class="mb-3">
                  <p class="text-sm text-gray-600 mb-2">Select existing categories:</p>
                  <div class="max-h-40 overflow-y-auto p-3 border border-gray-300 rounded-lg">
                    @foreach ($categories as $category )
                    <input type="checkbox" id="{{ $category->id }}" name="categories[]" value="{{ $category->id }}" 
                    {{ (is_array(old('categories')) &&  in_array($category->id, old('categories'))) ? 'checked' : '' }} >
                    <label for="{{ $category->id }}">{{ $category->name }}</label><br>
                  @endforeach
                  </div>
              </div>
          @endif




          <!-- Add New Categories -->
          <div class="{{ count($categories) == 0 ? 'mt-0' : 'mt-4' }}">
              <p class="text-sm text-gray-600 mb-2">
                  @if(count($categories) == 0)
                      No categories exist yet. Create new categories (comma separated):
                  @else
                      Add new categories (comma separated):
                  @endif
              </p>
              <input type="text" id="new_categories" name="new_categories" value="{{ old('new_categories') }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                  placeholder="Technology, Programming, Laravel...">
              <p class="text-xs text-gray-500 mt-1">Separate multiple categories with commas</p>
              <x-form-error name="new_categories"></x-form-error>
          </div>
      </div>
      

        
        <!-- Content Input -->
        <div class="mb-4">
          <label for="content" class="block text-gray-700 font-medium">Content</label>
          <textarea id="content" name="content" required rows="6"
            class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            placeholder="Write your blog content here...">{{ old('content') }} </textarea>
            <x-form-error name="content"></x-form-error>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700">
            Publish Post
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
  </div>
</x-app-layout>
