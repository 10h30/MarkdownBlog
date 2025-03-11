@props(['post'])
<div class="mt-auto">
  <a href="{{ route('post.show', $post->slug) }}" 
  class="inline-block border-2 border-solid text-blue-600 border-blue-600  px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white">
  Read More →
  </a>
</div>