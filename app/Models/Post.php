<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'slug'];

    public function user() {
        return $this->belongsTo(User::class); 
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)
                    ->whereNull('parent_id')
                    ->with(['replies', 'user']);
    }

    public static function boot() {
        
        parent::boot();

            // Triggered when a post is being created
    static::creating(function ($post) {
        // Only generate the slug if it's empty (during creation)
        if (empty($post->slug)) {
            $post->slug = Str::slug($post->title); // Generate slug from title
        }
    });

    // Triggered when a post is being updated
    static::updating(function ($post) {
        // Prevent the slug from being updated on post updates
        $post->slug = $post->getOriginal('slug');
    });
    }
}
