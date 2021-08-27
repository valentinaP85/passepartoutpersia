<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contatti');
    }
    public function send(ContactRequest $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $message=$request->input('message');

        $content=compact('name', 'email', 'message');
        
        Mail::to('passepartoutpersia@gmail.com')->send(New ContactMail($content));

        return redirect( route('contact.thankyou'));
    }

    public function thankyou()
    {
        return view ('contact.thankyou');
    }


}
