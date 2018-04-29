<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Work;
use App\Photo;
use App\WorkCategory;
use App\Tag;

use Illuminate\Support\Facades\Auth;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag=null)
    {
        $works = Work::all();

        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $work_categories = WorkCategory::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'id');

        return view('admin.works.create', compact('work_categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $user = Auth::user();

        $work = Work::first();

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name );

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $works = $user->works()->create($input);

        $works->tags()->attach($request->input('tags'));

        return redirect('/dashboard/works');
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
        $work = Work::findOrFail($id);
        $work_categories = WorkCategory::pluck('name', 'id');

        return view('admin.works.edit', compact('work', 'work_categories'));
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

        Auth::user()->works()->whereId($id)->first()->update($input);

        return redirect('/dashboard/works');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        if(public_path() . '/images/' . $work->photo->file > 0) {
           unlink(public_path() . '/images/' . $work->photo->file);
        }

        $work->delete();

        return redirect('/dashboard/works');

    }
}
