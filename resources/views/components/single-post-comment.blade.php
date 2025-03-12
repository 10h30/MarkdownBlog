<div class="bg-white p-10 shadow-md mt-20">
<form action="/comment" method="POST">
    @csrf
      <!-- Name -->
      <div class="mb-4">
        <label for="title" class="block text-gray-700 font-medium">Comment</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required
          class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
          placeholder="Comment">
        <x-form-error name="title"></x-form-error>
      </div>

      <div class="flex justify-end">
        <button type="submit"
          class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700">
          Post Comment
        </button>
      </div>




</form>

</div>
