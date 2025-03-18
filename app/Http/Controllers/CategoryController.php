<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show($slug)
    {
        // Find posts belong to the category
        $category = Category::where('slug', $slug)->firstorFail();

        $posts = $category->posts()->paginate(6);
        return view('post.index', compact('posts','category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $validatedAttrs = request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
        ]);

        // Update post using mass assignment
        $category->update([
            'name' => $validatedAttrs['name'],
            'description' => $validatedAttrs['description']
        ]);

        return redirect()->route('category.show', $category->slug)->with('success', 'Category updated successfully!');

    }

    public function update_slugs() {
        //Get all posts
        Category::withoutEvents(function () {
            $categories = Category::all();
            //dd($posts);
            foreach ($categories as $category) {
                if (empty($category->slug)) {
                    $category->slug = Str::slug($category->name);
                    $category->save();
                    //dump(Str::slug($post->title));
                }
            }
        });
            return 'Done. All the slugs is now generated';
    }
}
