<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;

class OperationManagerController extends Controller
{
    public function index(){
        $inspections = Inspection::where(['approvedBy_hygiene'=>1, 'approvedBy_siteman'=>1])->get();
        return view('opmanager.index', compact('inspections'));
    }
}
