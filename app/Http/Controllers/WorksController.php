<?php

namespace App\Http\Controllers;

use App\Work;
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

     return view('works.work', compact('work'));


 }

}
