<?php

namespace App\Http\Controllers\Dashboard;

use App\Photo; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class AdminMediaController extends Controller
{
    public function index() {

        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }


    public function create(){

        return view('admin.media.create');

    }

     public function store(Request $request){


        $file = $request->file('file');


        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);

    }

     public function destroy($id){

        $photo = Photo::findOrFail($id);


        if($photo->file) {
            unlink(public_path() . '/images/' . $photo->file);
         
           $photo->delete();
        }

        return redirect('/dashboard/media');  
    }


    public function deleteMedia(Request $request){

        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach($photos as $photo){

            $photo->delete();

        }
        return redirect()->back();

    }

}
