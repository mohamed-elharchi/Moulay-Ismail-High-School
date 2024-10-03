<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use Illuminate\Http\Request;
use App\Models\Student;

class CertificatController extends Controller
{
    public function index()
    {
        $certificats = Certificat::all();
        $students = Student::all();

        return view('certificats.index', compact('certificats', 'students'));
    }



    public function create()
    {
        return view('certificats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string',
            'date_naissance' => 'required|date',
            'code_mssar' => 'required|string',
            'numero_telephone' => 'required|string',
            'statut' => 'nullable|string',

        ]);

        Certificat::create($request->all());


          return back()->with('message', 'Votre demande a été reçue et va maintenant être traitée');
    }

    public function show(Certificat $certificat)
    {
        return view('certificats.show', compact('certificat'));
    }



    public function destroy(Certificat $certificat)
    {
        $certificat->delete();

        return redirect()->route('certificats.index')->with('success', 'Certificat supprimé avec succès.');
    }
    public function updateStatut(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:en cours,complété',
        ], [
            'statut.required' => 'Le statut est requis.',
            'statut.in' => 'Le statut doit être soit « En cours », soit « Complété ».',
        ]);
        $student = Certificat::findOrFail($id);

        $student->statut = $request->statut;
        $student->save();

        return redirect()->route('certificats.index')->with('success', 'Statut mis à jour avec succès');
    }
}

