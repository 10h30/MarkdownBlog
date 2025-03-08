<x-app-layout>
    <x-slot:heading>Site Settings</x-slot:heading>
    
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Site Settings</h1>
        @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        <!-- Blog Post Form -->
        <form action="{{ route('admin.setting.update') }}" method="POST">
            @csrf
            @method('PATCH')
          <!-- Site Title Input -->
          <div class="mb-4">
            <label for="site_title" class="block text-gray-700 font-medium">Site Title</label>
            <input type="text" id="site_title" name="site_title" value="{{$settings['site_title']}}" required
              class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Enter your site title">
            <x-form-error name="site_title"></x-form-error>
          </div>
  
          <!-- Site Description Input -->
          <div class="mb-4">
            <label for="site_description" class="block text-gray-700 font-medium">Site Description</label>
            <input type="text" id="site_description" name="site_description" value="{{$settings['site_description']}}" required
              class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Enter your site description">
            <x-form-error name="site_description"></x-form-error>
          </div>
  
          <!-- Submit Button -->
          <div class="flex justify-end">
            <button type="submit"
              class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700">
              Save Settings
            </button>
          </div>
  
        </form>
      </div>
</x-app-layout>