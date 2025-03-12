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
            'username' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'url|nullable',
            'content' => 'required',
        ]);
        //dd($validatedAttrs);
        $comment = new Comment($validatedAttrs);
        $comment->post_id = $post->id;
        if (Auth::check()) {
            $comment->user_id = Auth::id(); // Associate with logged-in user
            $comment->username = Auth::user()->name; // Use the user's name
        }
    
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
