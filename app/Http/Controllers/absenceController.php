<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisplayAbsenceRequest;
use App\Models\absence;
use App\Models\departement;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class absenceController extends Controller
{
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function selectDepartement()
    {
        $departements = departement::all();

        return view('dashboard.director_dashboard.selectDepartement', compact('departements'));
    }

    public function displayAbsence(DisplayAbsenceRequest $request)
    {
        $departmentName = $request->input('department_name');
        $fromDate = $request->input('from_date_display');
        $toDate = $request->input('to_date_display');

        // $fromDateMinusThreeDays = Carbon::parse($fromDate)->subDays(3)->format('Y-m-d');

        $department = departement::where('name', $departmentName)->first();
        $departmentId = $department->id;

        $absences = absence::where('departement_id', $departmentId)
            // ->whereBetween('date', [$fromDateMinusThreeDays, $toDate])
            ->get();

        return view('dashboard.director_dashboard.displayDepartementAbsence', compact('departmentName', 'fromDate', 'toDate', 'absences'));
    }


    public function generatePDF(Request $request)
    {
        $departmentName = $request->input('department_name');
        $fromDate = $request->input('from_date_display');
        $toDate = $request->input('to_date_display');

        $fromDateMinusThreeDays = Carbon::parse($fromDate)->subDays(3)->format('Y-m-d');

        $department = departement::where('name', $departmentName)->first();
        $departmentId = $department->id;

        $absences = absence::where('departement_id', $departmentId)
            ->whereBetween('date', [$fromDateMinusThreeDays, $toDate])
            ->get();

        // Generate HTML table
        $html = view('pdf.absence', compact('departmentName', 'fromDate', 'toDate', 'absences'))->render();

        // Generate PDF
        $pdf = SnappyPdf::loadHTML($html);

        // Set options if needed
        // $pdf->setOption('page-size', 'A4');

        // Return the PDF object
        return $pdf;
    }

    public function downloadPDF(Request $request)
    {
        // Generate the PDF
        $pdf = $this->generatePDF($request);

        // Download PDF
        return $pdf->download('absence_report.pdf');
    }


    public function create()
    {
        abort(404);
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
        //
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
