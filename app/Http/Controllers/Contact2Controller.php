<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class Contact2Controller extends Controller
{


   

    public function index()
    {
        $contacts = Contact::all();
        return view('contact2.index', compact('contacts'));
    }

    public function edit(Contact $contact)
    {
        return view('contact2.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }
}
