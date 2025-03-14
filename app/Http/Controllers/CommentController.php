<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post) 
    {
        
        $validatedAttrs = request()->validate([
            'content' => 'required',
            ] + ( Auth::guest() ? [
            'username' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'url|nullable',
        ] : []));
       
        //dd($validatedAttrs);
        $comment = new Comment($validatedAttrs);
        $comment->post_id = $post->id;
        if (Auth::check()) {
            $comment->user_id = Auth::id(); // Associate with logged-in user
            $comment->username = Auth::user()->name; // Use the user's name
            $comment->email = Auth::user()->email;
        }
    
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function reply(Request $request, Post $post, Comment $comment)
    {
        $validatedAttrs = request()->validate([
            'content' => 'required',
            ] + ( Auth::guest() ? [
            'username' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'url|nullable',
        ] : []));

        $reply = new Comment($validatedAttrs);
        $reply->post_id = $post->id;
        $reply->parent_id = $comment->id;

        if (Auth::check()) {
            $reply->user_id = Auth::id(); // Associate with logged-in user
            $reply->username = Auth::user()->name; // Use the user's name
            $reply->email = Auth::user()->email;
        }
    
        $reply->save();

        return redirect()->back()->with('success', 'Reply added successfully.');
    }
}
