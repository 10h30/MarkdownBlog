<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->with('categories','user')->Paginate(20);
        
        return view('post.index', compact('posts'));
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->firstorFail();
        $content = (new \Parsedown())->text($post->content);
        return view('post.single', compact('post', 'content'));
    }

    public function create(Post $post) {
        $categories = Category::orderBy('name')->get();
        return view('post.create', compact('categories'));
    }

    public function store() {
        $validatedAttrs = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:20',
            'categories' => 'array|nullable',
            'new_categories' => 'string|nullable'
        ]);

        // Add the authenticated user's ID
        $validatedAttrs['user_id'] = Auth::id();
        
        //dd($validatedAttrs);
        // Create post using mass assignment
        $post = Post::create($validatedAttrs);

         // Attach existing categories
        if (!empty($validatedAttrs['categories'])) {
            $post->categories()->attach($validatedAttrs['categories']);
        }

        if (!empty($validatedAttrs['new_categories'])) {
            $categoryNames = array_map('trim', explode(',',$validatedAttrs['new_categories']));
            foreach ($categoryNames as $categoryName) {
                        // Check if category already exists or create it
                        $category = Category::firstOrCreate(['name' => $categoryName]);

                        //Attach to post if not already attached
                        if (!$post->categories->contains($category->id)) {
                            $post->categories()->attach($category->id);
                        }

            }
        }
    

        return redirect()->route('blog')->with('success', 'Post created successfully!');

    }

    public function edit(Post $post) {
        $categories = Category::orderBy('name')->get();
        return view('post.edit', compact('post','categories'));
    }


    public function update(Post $post) {
        $validatedAttrs = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:20',
            'categories' => 'array|nullable',
            'new_categories' => 'string|nullable'
        ]);


        // Update post using mass assignment
        $post->update([
            'title' => $validatedAttrs['title'],
            'content' => $validatedAttrs['content']
        ]);

        // Removes old and add new categories
        if (isset($validatedAttrs['categories'])) {
            $post->categories()->sync($validatedAttrs['categories']);
        } else {
            // If no categories were selected, detach all
            $post->categories()->detach();
        }
    
        // Process new categories if provided
        if (!empty($validatedAttrs['new_categories'])) {
            $categoryNames = array_map('trim', explode(',', $validatedAttrs['new_categories']));
            
            foreach ($categoryNames as $categoryName) {
                if (!empty($categoryName)) {
                    // Check if category already exists or create it
                    $category = Category::firstOrCreate(['name' => $categoryName]);
                    
                    // Attach to post if not already attached
                    if (!$post->categories->contains($category->id)) {
                        $post->categories()->attach($category->id);
                    }
                }
            }
        }
       
        return redirect()->route('post.show', $post->slug)->with('success', 'Post updated successfully!');

    }

    public function destroy(Post $post) {
        $name=$post->title;
        $post->delete();
        return redirect()->route('blog')->with('success', "Post \"$name\" deleted successfully!");
    }

    public function update_slugs() {
        //Get all posts
        Post::withoutEvents(function () {
            $posts = Post::all();
            //dd($posts);
            foreach ($posts as $post) {
                if (empty($post->slug)) {
                    $post->slug = Str::slug($post->title);
                    $post->save();
                    //dump(Str::slug($post->title));
                }
            }
        });
            return 'Done. All the slugs is now generated';
    }
}
