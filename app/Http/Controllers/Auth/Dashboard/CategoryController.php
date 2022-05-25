<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index');
    }

    public function create()
    {
        return view('dashboard.category.create');
    }
}
