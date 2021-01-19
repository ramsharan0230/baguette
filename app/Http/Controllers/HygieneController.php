<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Exports\InspectionSumittedExport;
use App\Exports\InspectionUnSumittedExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class HygieneController extends Controller
{
    public function index(){
        $inspections = Inspection::where('approvedBy_siteman', 0)->where('approvedBy_opman', 0)->where('approvedBy_sropman', 0)->latest()->get();
        return view('hygiene.index', compact('inspections'));
    }

    public function submittedReport(){
        // dd(123);
        $inspections = Inspection::where('approvedBy_hygiene', 1)->latest()->get();
        $pdf = PDF::loadView('hygiene.reports.submitted.submitted-pdf', compact('inspections'));
        return $pdf->download('hygiene-submitted-report.pdf');
    }

    public function unSubmittedReport(){
        $inspections = Inspection::where('approvedBy_hygiene', 0)->latest()->get();
        $pdf = PDF::loadView('hygiene.reports.submitted.unsubmitted-pdf', compact('inspections'));
        return $pdf->download('hygiene-unsubmitted-report.pdf');
    }

    public function submittedReportExcel(){
        return Excel::download(new InspectionSumittedExport, 'inspection.xlsx');
    }

    public function unSubmittedReportExcel(){
        return Excel::download(new InspectionUnSumittedExport, 'inspection.xlsx');
    }
}
