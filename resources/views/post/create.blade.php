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
  
      <x-form method="POST">
        <x-form-input name="title" label="Title" required placeholder="Enter your blog post title" />
       
         <!-- Categories Section -->
         <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2">Categories</label>
          <!-- Existing Categories - With Empty State -->
          @if(count($categories) > 0)
              <div class="mb-6">
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
              <x-form-input name="new_categories" label="New Categories"  value="{{ old('new_categories') }}"  placeholder="Technology, Programming, Laravel..." />
               <p class="text-xs text-gray-500 mt-1">Separate multiple categories with commas</p>
           </div>
          </div>
        
        <!-- Content Input -->
        <x-form-textarea name="content" label="Content" required />


        <!-- Submit Button -->
        <div class="flex justify-end">
          <x-primary-button>Publish Post</x-primary-button>
        </div>
      </x-form>

    </div>

      <!-- Back Button -->
      <div class="mb-6 mt-6">
        <a href="/blog" class="text-blue-600 hover:underline flex items-center">
          ⬅ Back to Blog
        </a>
      </div>
  </div>
{{-- 
  <x-forms.form>
    <x-forms.input type="text" name="title" label="Title" />
    <x-forms.select name="categories" label="Select Categories"></x-forms.select>

    <x-forms.textarea name="content" label="Content" />
    <x-forms.button>Submit</x-forms.button>
  </x-forms.form> --}}
</x-app-layout>
