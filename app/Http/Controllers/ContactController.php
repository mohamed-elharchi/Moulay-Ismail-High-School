<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{


    public function showInAyoub()
    {
        $messagee = ContactMessage::all();
        return view('Acccueil.Home', compact('messagee'));
    }


    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ], [
            'name.required' => 'Le nom est requis.',
            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'L\'adresse e-mail doit être une adresse e-mail valide.',
            'message.required' => 'Le message est requis.',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('message', 'Votre message a été envoyé avec succès!');
    }

    public function deleteMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect('/messages')->with('success', 'Le message a été supprimé avec succès!');
    }
    public function showMessage()
    {
        $messages = ContactMessage::all();
        return view('contact.messages', compact('messages'));
    }
}

