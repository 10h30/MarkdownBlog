@props(['post'])
<div class="text-gray-600 text-base">
  <p>{!! nl2br(e(Str::limit($post->content))) !!}</p>
</div>
