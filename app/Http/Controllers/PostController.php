<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function create(Request $request)
    {
        // dd($request->parameters);
        $categories = Category::get();
        return view('post.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
