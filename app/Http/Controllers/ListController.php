<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class ListController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        return view('list', [
            'categories' => $categories
        ]);
    }

    public function list(Category $category)
    {
        
        $posts = Post::where('category_id', '=', $category->id)->get();
        return view('category', [
            'posts' => $posts
        ]);
    }
}
