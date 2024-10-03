<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AccueilController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('Acccueil.Home', compact('contacts'));
    }


    public function index2()
    {
        return view('Acccueil.About');
    }


}

