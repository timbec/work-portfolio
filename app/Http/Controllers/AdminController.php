<?php

namespace App\Http\Controllers;

use App\Post; 
use App\Work;
use App\Category; 
use App\Tag; 

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $postsCount = Post::count(); 
        $worksCount = Work::count(); 
        $categoriesCount = Category::count();
        $tagsCount = Tag::count(); 

        return view('admin.index', compact('postsCount', 'worksCount', 'categoriesCount', 'tagsCount'));
    }
}
