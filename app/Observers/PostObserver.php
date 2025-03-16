<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post): void
    {
        //dd('Observer is running', $post->title); // Debugging line
        if (empty($post->slug)) {
            $post->slug = Str::slug($post->title); // Generate slug from title
        }
        
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updating(Post $post): void
    {
        $post->slug = $post->getOriginal('slug');
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
