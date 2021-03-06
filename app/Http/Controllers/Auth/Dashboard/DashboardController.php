<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ReportedPost;

class DashboardController extends Controller
{
    public function index()
    {
        $reports = ReportedPost::get();
        return view('dashboard.index', [
            'reports' => $reports
        ]);
    }
}
