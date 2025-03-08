<?php

namespace App\Http\Controllers;

use App\Mail\NewContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function edit() {
        return view('contact');
    }

    public function store()
    {
        $validatedAttrs = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'content' => 'required|min:20'
        ]);
        Mail::to('dummyemail@email.com')
            ->send(new NewContact($validatedAttrs));
        //dd($validatedAttrs);
        return redirect()->back()->with('success', 'Thank you contacting me! I will get back to you after 1 year, maybe');

    }
}
