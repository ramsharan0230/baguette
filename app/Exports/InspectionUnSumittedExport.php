<?php

namespace App\Exports;

use App\Models\Inspection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InspectionUnSumittedExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('hygiene.exports.unsubmitted', [
            'inspections' => Inspection::where('approvedBy_hygiene', 0)->latest()->take(100)->get()
        ]);
    }
}
