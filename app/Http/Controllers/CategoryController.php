<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {
        // Find posts belong to the category
        //dd($category);
        $posts = $category->posts;
        return view('post.index', compact('posts','category'));
    }
}
