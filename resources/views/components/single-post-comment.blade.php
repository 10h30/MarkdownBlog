@props(['post'])


@if ($post->comments->count() > 0)
    <h2 class="text-3xl mt-20">{{ $post->comments->count()  }} Comments</h2>
        @foreach ($post->comments as $index => $comment)
            @if (! $comment->parent_id)
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
                    @foreach ($comment->replies as $comment)   
                        <div class="replies bg-white p-10 shadow-md mt-10 ml-10">
                            <div class="font-semibold text-xl">{{ $comment->username }}</div>
                            <div class="text-xs text-gray-600">{{ $comment->created_at->format('Y/m/d')  }}</div>
                            <div class="my-10">{{ $comment->content }};</div>
                        </div>
                    @endforeach

                @endif
            @endif
        
        @endforeach
@else

<h2 class="text-3xl mt-20">No comments yet</h2>


@endif

<div class="bg-white p-10 shadow-md mt-20">

    <h3 class="mt-10 mx-auto text-align">Leave your comment</h3>
   
    <x-form method="POST" action="{{ route('comment.post', $post) }}">
        @guest
        <x-form-input name="username" label="Your Name" placeholder="Jacky Chan" required />
        <x-form-input type="email" name="email" placeholder="jacky@chan.com" label="Email Address" required />
        <x-form-input type="url" name="webiste" label="Website (optional)" />
        @endguest   
        <x-form-textarea name="content" label="Comment" rows="5" />
        <x-primary-button>Post Comment</x-primary-button>
    </x-form>
</div>



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