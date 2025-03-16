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