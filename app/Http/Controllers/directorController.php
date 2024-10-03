<?php

namespace App\Http\Controllers;

use App\Http\Requests\d_u_request;
use App\Http\Requests\departementRequest;
use App\Http\Requests\directorRequest;
use App\Http\Requests\matiereRequest;
use App\Http\Requests\SaveTeacherRequest;
use App\Models\Admin;
use App\Models\departement;
use App\Models\matiere;
use App\Models\teacher;
use App\Models\teacher_department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class directorController extends Controller
{
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function generalGuardDashboard()
    // {
    //     return view('dashboard.director_dashboard.index');
    // }
    // public function directorDashboard()
    // {
    //     return view('dashboard.director_dashboard.index');
    // }

    // public function selectDepartement(){
    //     return view('dashboard.director_dashboard.selectDepartement');
    // }



    public function displayMatieres()
    {
        $matieres = matiere::paginate(5);
        return view('dashboard.director_dashboard.indexMatieres', compact('matieres'));
    }
    public function showCreateMatiere()
    {

        return view('dashboard.director_dashboard.addMatiere');
    }
    public function saveMatiere(matiereRequest $request)
    {

        $existingMatiere = Matiere::where('name', $request->input('name'))->first();

        if ($existingMatiere) {
            return redirect()->route('displayMatieres')->with('success', 'La matière existe déjà');
        }

        $matiere = new Matiere();
        $matiere->name = $request->input('name');
        $matiere->save();
        return redirect()->route('displayMatieres')->with('success', 'Registration successful');
    }

    public function showDepartements()
    {
        $departements = departement::paginate(5);
        return view('dashboard.director_dashboard.indexDepartement', compact('departements'));
    }
    public function addDepartement()
    {
        return view('dashboard.director_dashboard.addDepartement');
    }
    public function saveDepartement(departementRequest $request)
    {
        $existingDepartement = departement::where('name', $request->input('name'))->first();

        if ($existingDepartement) {
            return redirect()->route('showDepartements')->with('success', 'La departement existe déjà');
        }

        $departement = new departement();
        $departement->name = $request->input('name');

        if ($request->hasFile('students_list')) {
            $image = $request->file('students_list');
            $destinationPath = 'imagess/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $departement->students_list = $filename;
        }

        $departement->save();

        return redirect()->route('showDepartements')->with('success', 'Registration successful');
    }

    public function updateDepartement($id)
    {
        $departement = departement::findOrFail($id);
        return view('dashboard.director_dashboard.updateDepartement', compact('departement'));
    }

    public function saveUpdateDepartement(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'students_list' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ],
        [
            'students_list.required' => 'Le champ liste des étudiants est requis.',
            'students_list.image' => 'Le fichier doit être une image.',
            'students_list.mimes' => 'Le fichier doit être de type :jpeg, png, jpg, gif.',
            'students_list.max' => 'Le fichier ne doit pas dépasser :max kilo-octets.',
        ]);

        $departement = Departement::findOrFail($id);

        $departement->name = $validatedData['name'];

        if ($request->hasFile('students_list')) {
            if ($departement->students_list) {
                Storage::delete('imagess/' . $departement->students_list);
            }
            $image = $request->file('students_list');
            $destinationPath = 'imagess/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $departement->students_list = $filename;

            

            $departement->students_list = $filename;
        }

        $departement->save();

        return redirect()->route('showDepartements')->with('success', 'la classe a été mise à jour avec succès.');
    }


    //teachers
    public function displayTeachers()
    {
        $teachers = Teacher::with('admin', 'matiere', 'departments')->paginate(5);
        return view('dashboard.director_dashboard.indexTeachers', compact('teachers'));
    }

    public function addTeacher()
    {
        $matieres = Matiere::all();

        $departements = Departement::all();

        $teachers = Admin::where('role', 'teacher')
            ->leftJoin('teachers', 'admins.id', '=', 'teachers.admin_id')
            ->leftJoin('teacher_departments', 'teachers.id', '=', 'teacher_departments.teacher_id')
            ->whereNull('teacher_departments.departement_id')
            ->select('admins.*')
            ->distinct()
            ->get();
        // $teachers = Admin::where('role', 'teacher')->get();

        // $ids = [];
        // foreach ($teachers as $teacher) {
        //     $ids[] = $teacher->id;
        // }
        // $ttt = [];
        // foreach ($ids as $id) {
        //     $ttt [] = Teacher::where('admin_id', $id)->get();
        // }


        // $teacherNames = [];
        // foreach ($ttt as $t) {
        //     $teacherNames[] = teacher_department::where('teacher_id', '!=', $t->id)->whereNull('departement_id')->first();        }
        // dd($teacherNames);




        return view('dashboard.director_dashboard.addTeacher', compact('matieres', 'departements', 'teachers'));
    }




    public function saveTeacher(SaveTeacherRequest $request)
    {
        $validatedData = $request->validated();

        $teacher = new Teacher();
        $teacher->admin_id = $validatedData['admin_id'];
        $teacher->matiere_id = $validatedData['matiere_id'];
        $teacher->save();

        if (isset($validatedData['departement_ids'])) {
            $teacher->departments()->attach($validatedData['departement_ids']);
        }

        return redirect()->route('displayTeachers')->with('success', 'Teacher added successfully');
    }
    public function updateTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacherNmae = $teacher->admin->name;
        $matieres = Matiere::all();
        $departments = Departement::all();

        return view('dashboard.director_dashboard.updateTeacher', compact('teacher', 'matieres', 'departments', 'teacherNmae'));
    }

    public function saveUpdate(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'matiere_id' => 'required|exists:matieres,id',
            'department_ids' => 'array',
            'department_ids.*' => 'exists:departements,id',
        ]);

        $teacher->matiere_id = $request->matiere_id;

        $teacher->departments()->sync($request->department_ids);

        $teacher->save();

        return redirect()->route('displayTeachers')->with('success', 'Les informations du professeur ont été mises à jour avec succès.');
    }


    public function filter(Request $request)
    { {
            $role = $request->input('role');

            $query = Admin::query();

            if ($role) {
                $query->where('role', $role);
            }

            $generalGuards = $query->paginate(5);

            return view('dashboard.director_dashboard.index', compact('generalGuards'));
        }
    }


    public function index()
    {
        $generalGuards = Admin::paginate(5);
        return view('dashboard.director_dashboard.index', compact('generalGuards'));
    }


    public function create()
    {
        return view('dashboard.director_dashboard.addGeneralGuard');
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(directorRequest $request)
    {

        $generalGuard = new Admin();
        $generalGuard->name = $request->input('name');
        $generalGuard->email = $request->input('email');
        $generalGuard->password = Hash::make($request->input('password'));
        $generalGuard->role = $request->input('role');

        $generalGuard->save();

        return redirect()->route('general_guard')->with('success', 'Registration successful');
    }
    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function show()
    // {
    //     return view('dashboard.director_dashboard.addGeneralGuard');
    // }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $generalGuard = Admin::findOrFail($id);

        return view('dashboard.director_dashboard.updateGeneralGuard',)->with('generalGuard', $generalGuard);
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(d_u_request $request, $id)
    {
        $generalGuard = Admin::findOrFail($id);

        $generalGuard->name = $request->input('name');
        $generalGuard->email = $request->input('email');
        $generalGuard->role = $request->input('role');
        $generalGuard->save();

        return redirect()->route('general_guard')->with('success', 'Informations utilisateur mises à jour avec succès');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generalGuard = Admin::findOrFail($id);
        $generalGuard->delete();
        return redirect()->route('general_guard')->with('success', 'La garde générale a été supprimée avec succès');
    }
    public function destroyMatiere($id)
    {
        $matiere = matiere::findOrFail($id);
        $matiere->delete();
        return redirect()->route('displayMatieres')->with('success', 'matiere a été supprimée avec succès');
    }
    public function destroyDepartement($id)
    {
        $departement = departement::findOrFail($id);
        if (!empty($departement->students_list)) {
            $imagePath = public_path('imagess/' . $departement->students_list);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $departement->delete();
        return redirect()->route('showDepartements')->with('success', 'Département a été supprimé avec succès');
    }

    public function destroyTeacher($id)
    {
        $teacher = teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('displayTeachers')->with('success', 'Departements a été supprimée avec succès');
    }
}
