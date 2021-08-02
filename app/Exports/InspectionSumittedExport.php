<?php

namespace App\Exports;

use App\Models\Inspection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InspectionSumittedExport implements FromView
{
    public function view(): View
    {
        return view('hygiene.exports.submitted', [
            'inspections' => Inspection::where('approvedBy_hygiene', 1)->latest()->take(100)->get()
        ]);
    }
}
