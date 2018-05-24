<?php

namespace App\Http\Controllers;

use App\Work;
use App\Tag; 
use App\WorkCategory;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $works = Work::all();

     return view('works.index', compact('works'));
    }

    public function work($slug){

     $work = Work::findBySlugOrFail($slug);
     $tags = Tag::all();

     return view('works.work', compact('work'));


 }

}
