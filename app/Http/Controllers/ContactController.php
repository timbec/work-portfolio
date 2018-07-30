<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;


class ContactController extends Controller
{
    public function create()
    {
        return view('pages.contact');
    }

    public function store(ContactFormRequest $request)
    {

        \Mail::send('email.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)

    {
        $message->from('timothybenjaminbeckett@gmail.com');
        $message->to('timothybenjaminbeckett@gmail.com', 'Admin')->subject('Message From Web Portfolio');
    });

        // return \Redirect::route('')
        //     ->with('message', 'Thank You for Contacting Me');
    }
}
