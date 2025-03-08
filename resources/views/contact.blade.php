<x-app-layout>
    <x-slot:heading>Contact Page</x-slot:heading>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
    <!-- Form Card -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Contact Me</h1>
        <p class="mt-4 mb-4">Wanna chat? Drop me an email. I will get back to you after I master Laravel.</p>
        <!-- Blog Post Form -->
        <form action="/contact" method="POST">
          @csrf
          <!-- Name Input -->
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
              class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Enter your name">
            <x-form-error name="name"></x-form-error>
          </div>

           <!-- Email Input -->
           <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
              class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Please enter your email">
            <x-form-error name="email"></x-form-error>
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
              Submit
            </button>
          </div>
  
        </form>
      </div>
  
    </div>
</x-app-layout>