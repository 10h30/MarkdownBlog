<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category: ') }} {{ $category->name }}
        </h1>
    </x-slot>
   
    <div class="max-w-3xl mx-auto px-4  py-12">

    <!-- Form Card -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
      <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Category</h1>

        <x-form method="POST" action="{{ route('category.update', $category) }}">
            @method('PATCH')
            <x-form-input name="name" label="Category Name" value="{{ $category->name }}" required />
            <x-form-textarea name="description" label="Desciprtion" rows="5" :value="$category->description"/>
            <x-primary-button>Update Category</x-primary-button>
        </x-form>

     
    </div>

      <!-- Back Button -->
      <div class="mb-6 mt-6">
        <a href="/blog" class="text-blue-600 hover:underline flex items-center">
          ⬅ Back to Blog
        </a>
      </div>
  </div>
</x-app-layout>
