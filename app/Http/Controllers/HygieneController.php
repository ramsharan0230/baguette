<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;

class HygieneController extends Controller
{
    public function index(){
        $inspections = Inspection::where('approvedBy_siteman', 0)->where('approvedBy_opman', 0)->where('approvedBy_sropman', 0)->latest()->get();
        return view('hygiene.index', compact('inspections'));
    }
}
