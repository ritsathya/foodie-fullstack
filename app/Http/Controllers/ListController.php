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
<<<<<<< HEAD
        $posts = Post::whereJsonContains('category_id', strval($category->id))->get();

=======
        
        $posts = Post::where('category_id', '=', $category->id)->get();
>>>>>>> b3af45537e2f8dcdbba52b1062d54693d15f66e1
        return view('category', [
            'posts' => $posts
        ]);
    }
}
