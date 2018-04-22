<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Work; 
class PagesController extends Controller
{
    public function menu()
    {
        //Not sure how to do this yet
    }

    public function home() {

        $works = Work::all(); 

        return view('pages.home', compact('works'));
    }

     public function about() {

        return view('pages.about');
    }

     public function contact() {

        return view('pages.contact');
    }

}
