<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $fillable = ['username', 'email', 'website', 'content', 'parent_id', 'user_id', 'post_id'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class,'parent_id')->with('replies');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

}
