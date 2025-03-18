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
      <x-form method="PATCH" action="/post/{{ $post->id }}" >

        <!-- Title Input -->
        <x-form-input name="title" label="Title" required value="{{ $post->title }}"  placeholder="Enter your blog post title" />
    

                 <!-- Categories Section -->
                 <div class="mb-4">
                  <label class="block text-gray-700 font-medium mb-2">Categories</label>
                  
                  <!-- Existing Categories - With Empty State -->
                  @if(count($categories) > 0)
                      <div class="mb-3">
                          <p class="text-sm text-gray-600 mb-2">Select existing categories:</p>
                          <div class="max-h-40 overflow-y-auto p-3 border border-gray-300 rounded-lg">
                              @foreach($categories as $category)
                              <div class="flex items-center mb-2">
                                  <input type="checkbox" id="category-{{ $category->id }}" name="categories[]" 
                                      value="{{ $category->id }}" 
                                      {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) || 
                                           (old('categories') === null && $post->categories->contains($category->id)) ? 'checked' : '' }}
                                      class="mr-2">
                                  <label for="category-{{ $category->id }}" class="text-gray-700">{{ $category->name }}</label>
                              </div>
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

        <x-form-textarea name="content" label="Content" required :value="$post->content" />

        <!-- Submit Button -->
        <div class="flex justify-end">
          <x-primary-button>Update Post</x-primary-button>
        </div>
      
        
      </x-form>
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
