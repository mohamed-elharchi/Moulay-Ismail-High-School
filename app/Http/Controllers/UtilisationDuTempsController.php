<?php

namespace App\Http\Controllers;

use App\Models\departement;
use Illuminate\Http\Request;
use App\Models\utilisation_du_temps;

class UtilisationDuTempsController extends Controller
{




    // public function filterByDepartement(Request $request)
    // {
    //     $departmentName = $request->input('role');

    //     $utilisations = utilisation_du_temps::whereHas('departement', function ($query) use ($departmentName) {
    //         $query->where('name', $departmentName);
    //     })->get();

    //     return view('utilisations.index', compact('utilisations'));
    // }

    public function index(Request $request)
    {
        $searchQuery = $request->input('role');
        $utilisationss = utilisation_du_temps::with('departement')->get();

        $utilisations = utilisation_du_temps::query();
        if ($searchQuery) {
            $utilisations->whereHas('departement', function ($query) use ($searchQuery) {
                $query->where('name', $searchQuery);
            });
        }
        $utilisations = $utilisations->with('departement')->get();

        return view('utilisations.index', compact('utilisations','utilisationss'));
    }


    public function index4(Request $request)
    {
        $searchQuery = $request->input('role');


        $utilisationss = utilisation_du_temps::with('departement')->get();

        $utilisations = utilisation_du_temps::with('departement');

        if ($searchQuery) {
            $utilisations->whereHas('departement', function ($query) use ($searchQuery) {
                $query->where('name', $searchQuery);
            });
        }

        $utilisations = $utilisations->get();


        return view('Acccueil.Calendriers', compact('utilisations', 'utilisationss'));
    }



    public function create()
    {
        $departements = departement::all();
        return view('utilisations.create')->with('departements', $departements);
    }

    public function store(Request $request)
    {
        $request->validate([
            'departement_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $utilisation_du_temps = new utilisation_du_temps();

        $utilisation_du_temps->departement_id = $request->input('departement_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('imagess/');
            $image->move($destinationPath, $filename);
            $utilisation_du_temps->image = $filename;
        }

        $utilisation_du_temps->save();

        // Redirect with success message
        return redirect()->route('utilisations.index')->with('success', 'Utilisation du temps créée avec succès.');
    }



    public function show(utilisation_du_temps $utilisation)
    {
        return view('utilisations.show', compact('utilisation'));
    }

    public function edit(utilisation_du_temps $utilisation)
    {
        return view('utilisations.edit', compact('utilisation'));
    }


    public function update(Request $request, $id)
    {
        $utilisation = utilisation_du_temps::findOrFail($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image upload
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            // If a new image is uploaded, delete the old one
            if ($utilisation->image && file_exists(public_path('imagess/' . $utilisation->image))) {
                unlink(public_path('imagess/' . $utilisation->image));
            }

            // Upload the new image
            $image = $request->file('image');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('imagess/');
            $image->move($destinationPath, $profileImage);

            $input['image'] = $profileImage;
        }

        // Update the utilisation du temps
        $utilisation->update($input);

        return redirect()->route('utilisations.index')->with('success', 'Utilisation du temps mise à jour avec succès');
    }


    public function destroy(utilisation_du_temps $utilisation)
    {

        if (file_exists('imagess/' . $utilisation->image)) {
            unlink('imagess/' . $utilisation->image);
        }

        $utilisation->delete();

        return redirect()->route('utilisations.index')->with('success', 'Utilisation du temps supprimée avec succès');
    }
}
