<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        return Inertia::render('Dashboard/Landing');
    }

    public function blog(){
        $posts = Post::orderBy('created_at')->paginate(20);
        return Inertia::render('Dashboard/Blog/List', compact('posts'));
    }

    public function projects(){
        $projects = Project::orderBy('created_at')->paginate(20);
        return Inertia::render('Dashboard/Projects/List', compact('projects'));
    }
}
