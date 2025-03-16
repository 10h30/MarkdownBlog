@props(['comments'])

<!-- Comment Display -->
@foreach ($comments as $index => $comment)
            {{-- @if (! $comment->parent_id) --}}
                <div class="bg-white p-10 shadow-md mt-10">
                        <div class="font-semibold text-xl">{{ $comment->username }}</div>
                        <div class="text-xs text-gray-600">{{ $comment->created_at->format('Y/m/d')  }}</div>
                        <div class="my-10">{{ $comment->content }};</div>
                        <div class="text-right"><a href="#{{ $comment->id }}" onclick="toggleReplyForm('reply-form-{{ $comment->id }}')">Reply</a></div>
                </div>

                <div id="reply-form-{{ $comment->id }}" class="bg-white p-10 shadow-md mt-10" style="display:none">
                    <h3 class="mt-10 mx-auto text-align">Reply to {{ $comment->username }}</h3>
                    <x-form method="POST"  action="{{ route('comment.reply', [$post, $comment]) }}">
                        @guest
                        <x-form-input name="username" label="Your Name" placeholder="Jacky Chan" required />
                        <x-form-input type="email" name="email" placeholder="jacky@chan.com" label="Email Address" required />
                        <x-form-input type="url" name="webiste" label="Website (optional)" />
                        @endguest   
                        <x-form-textarea name="content" label="Comment" rows="5" />
                        <x-primary-button>Post Comment</x-primary-button>
                    </x-form>
                </div>
                @if ($comment->replies)
                    <div class="replies ml-4">
                        @include('post.comment-display', ['comments' => $comment->replies])
                    </div>
              

                @endif
        
@endforeach
<script>
    function toggleReplyForm(formID)    {
        const form = document.getElementById(formID);
        console.log(formID);
        if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        } else {
        form.style.display = 'none';
        }
    }
  </script>   
