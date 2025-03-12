@props(['post'])


@if ($post->comments->count() > 0)
<h2 class="text-3xl mt-20">{{ $post->comments->count()  }} Comments</h2>
    @foreach ($post->comments as $index => $comment)
    <div class="bg-white p-10 shadow-md mt-10">
            <div class="font-semibold text-xl">{{ $comment->username }}</div>
            <div class="text-xs text-gray-600">{{ $comment->created_at->format('Y/m/d')  }}</div>
            <div class="my-10">{{ $comment->content }};</div>
            <div></div>
            
        </div>
        @endforeach
@else

<h2 class="text-3xl mt-20">No comments yet</h2>


@endif

<div class="bg-white p-10 shadow-md mt-20">

    <h3 class="mt-10 mx-auto text-align">Leave your comment</h3>
   
    <x-form method="POST" action="{{ route('comment', $post) }}">
        <x-form-input name="username" label="Your Name" placeholder="Jacky Chan" required />
        <x-form-input type="email" name="email" placeholder="jacky@chan.com" label="Email Address" required />
        <x-form-input type="url" name="webiste" label="Website (optional)" />
        <x-form-textarea name="content" label="Comment" rows="5" />
        <x-primary-button>Post Comment</x-primary-button>
    </x-form>
</div>

