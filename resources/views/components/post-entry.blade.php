@props(['post'])
<div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 flex flex-col gap-4">
  <!-- Post Title -->
  <x-post-title :slug="$post->slug">{{ $post->title }}</x-post-title>

  <!-- Post Categories -->
  <x-post-category :post="$post" />

  <!-- Post Meta -->
  <x-post-meta :post="$post" />

  <!-- Post Excerpt (First 50 characters) -->
  <x-post-excerpt :post="$post" />

   <!-- Read More Button -->
  <x-post-readmore :post="$post" />
</div>