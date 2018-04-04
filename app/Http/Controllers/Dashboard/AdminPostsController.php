<?php

namespace App\Http\Controllers\Dashboard;

use App\Post; 
use App\Photo; 
use App\Category; 
use Illuminate\Http\Request;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Controllers\Controller;

use App\Http\Requests; 
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5); 

        return view('admin.posts.index', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all(); 

        $user = Auth::user(); 

        $post = Post::first(); 

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name ); 

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
        }

        $user->posts()->create($input);

        return redirect('/dashboard/posts'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id); 
        $categories = Category::pluck('name', 'id'); 

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all(); 

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name ); 

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('/dashboard/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path() . '/images/' . $post->photo->file);

        $post->delete();

        return redirect('/dashboard/posts');

    }


    /**
     * Posts on the front end
     */
     public function post($slug){


        $post = Post::findBySlugOrFail($slug);


        return view('post', compact('post'));


    }

}
