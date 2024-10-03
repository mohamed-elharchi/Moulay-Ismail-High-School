<?php

namespace App\Http\Controllers;

use App\Models\absence;
use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\departement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class teacherController extends Controller
{
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function teacherDashboard()
    {
        $teacherId = auth()->id();
        $departements = DB::table('teacher_departments')
            ->join('departements', 'teacher_departments.departement_id', '=', 'departements.id')
            ->join('teachers', 'teacher_departments.teacher_id', '=', 'teachers.id')
            ->where('teachers.admin_id', $teacherId)
            ->select('departements.*')
            ->get();

        $teacher = auth()->user();

        return view('dashboard.teacher_dashboard.index', compact('teacher', 'departements'));
    }
    public function displayAbsence(Request $request)
    {
        $request->validate([
            'department' => 'required|exists:departements,id',
        ]);

        $departmentId = $request->input('department');

        $absence = Absence::where('departement_id', $departmentId)->latest()->first();

        if ($absence) {
            $departementName = $absence->departement->name;
            $studentsList = $absence->departement->students_list;
            return view('dashboard.teacher_dashboard.displayAbsence', compact('absence', 'departmentId', 'departementName', 'studentsList'));
        } else {
            $departementName = departement::findOrFail($departmentId)->name;
            $studentsList = departement::findOrFail($departmentId)->students_list;
            return view('dashboard.teacher_dashboard.displayAbsence', compact('departmentId', 'departementName', 'studentsList'))
                ->with('error', 'No absence record found for the selected department.');
        }
    }

    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'date' => 'required|date',
    //         'period' => 'required',
    //         'absence' => 'required|array',
    //         'absence.*' => 'required|integer|between:1,40',
    //         'signature' => 'required|string|max:50',
    //         'department' => 'required|exists:departements,id',
    //     ]);


    //     $teacherId = auth()->id();
    //     $departmentId = $request->input('department');
    //     $absenceString = implode('-', $request->absence);

    //     $absence = new Absence();
    //     $absence->departement_id = $departmentId;
    //     $absence->date = $request->date;
    //     $absence->period = $request->period;
    //     $absence->absence = $absenceString;
    //     $absence->signature = $request->signature;
    //     $absence->teacher_id = $teacherId;

    //     $absence->save();
    //     return redirect()->route('teacherDashboard')->with(['success' => 'Absence record inserted successfully.', 'absence' => $absence]);
    // }
    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'period' => 'required',
            'absence' => 'array',
            'absence.*' => 'integer|between:1,40',
            'signature' => 'required|string|max:50',
            'department' => 'required|exists:departements,id',
        ], [
            'date.required' => 'La date est requise.',
            'date.date' => 'La date doit être une date valide.',
            'period.required' => 'La période est requise.',
            'absence.array' => 'Les absences doivent être fournies sous forme de tableau.',
            'absence.*.integer' => 'La valeur d\'absence doit être un entier.',
            'absence.*.between' => 'La valeur d\'absence doit être comprise entre 1 et 40.',
            'signature.required' => 'La signature est requise.',
            'signature.string' => 'La signature doit être une chaîne de caractères.',
            'signature.max' => 'La signature ne doit pas dépasser :max caractères.',
            'department.required' => 'Le département est requis.',
            'department.exists' => 'Le département sélectionné est invalide.',
        ]);

        $teacherId = auth()->id();
        $departmentId = $request->input('department');

        if ($request->has('absence') && count($request->absence) > 0) {
            $absenceString = implode('-', $request->absence);
        } else {
            $absenceString = 'Tous les étudiants sont présents';
        }

        $absence = new Absence();
        $absence->departement_id = $departmentId;
        $absence->date = $request->date;
        $absence->period = $request->period;
        $absence->absence = $absenceString;
        $absence->signature = $request->signature;
        $absence->teacher_id = $teacherId;

        $absence->save();

        return redirect()->route('teacherDashboard')->with(['success' => "Enregistrement d'absence inséré avec succès.", 'absence' => $absence]);
    }


    public function editAbsence($id)
    {
        $absence = Absence::findOrFail($id);
        return view('dashboard.teacher_dashboard.editAbsence', compact('absence'));
    }

    public function updateAbsence(Request $request, $id)
    {
        $request->validate([
            'period' => 'required',
            'absence' => 'required|array',
            'signature' => 'required|string|max:50',
        ]);

        $absence = Absence::findOrFail($id);

        $absence->period = $request->period;
        $absence->absence = implode('-', $request->absence);
        $absence->signature = $request->signature;

        $absence->save();

        return redirect()->route('teacherDashboard')->with('success', "L'absence a été mise à jour avec succès.");
    }




    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        abort(404);
    }
}
