<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        //
    }
    //show form contact
    public function form()
    {   
        return view('frontend.contact');
    }
    //post contact
    public function post(ContactRequest $request)
    {
        Contact::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'content'=>$request->content
        ]);
        return redirect()->route('frontend.index')->with('contact',"ok");
    }

}
