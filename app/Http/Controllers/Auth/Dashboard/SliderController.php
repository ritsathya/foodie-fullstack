<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('dashboard.slider.index');
    }

    public function create()
    {
        return view('dashboard.slider.create');
    }
}
