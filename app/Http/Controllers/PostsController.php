<?php

namespace App\Http\Controllers;

use App\Post; 
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {

        $posts = Post::all(); 

        return view('blog.index', compact('posts'));
    }

     public function post($slug){

        $post = Post::findBySlugOrFail($slug);

        return view('blog.post', compact('post'));


    }

}
