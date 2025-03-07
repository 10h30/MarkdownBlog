<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->latest()->Paginate(20);
        return view('post.index', compact('posts'));
    }

    public function show(Post $post) {
        return view('post.single', compact('post'));
    }

    public function create(Post $post) {
        return view('post.create');
    }

    public function store() {
        $validatedAttrs = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:20'
        ]);

        // Add the authenticated user's ID
        $validatedAttrs['user_id'] = Auth::id();
        //dd($validatedAttrs);
        // Create post using mass assignment
        $post = Post::create($validatedAttrs);

        return redirect()->route('blog')->with('success', 'Post created successfully!');

    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }


    public function update(Post $post) {
        $validatedAttrs = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:20'
        ]);

        // Add the authenticated user's ID
        $validatedAttrs['user_id'] = Auth::id();
        //dd($validatedAttrs);
        // Create post using mass assignment
        $post->update($validatedAttrs);

        return redirect()->route('blog')->with('success', 'Post updated successfully!');

    }

    public function destroy(Post $post) {
        $name=$post->title;
        $post->delete();
        return redirect()->route('blog')->with('success', "Post \"$name\" deleted successfully!");
    }
}
