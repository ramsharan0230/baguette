<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;

class HygieneController extends Controller
{
    public function index(){
        $inspections = Inspection::latest()->get();
        return view('hygiene.index', compact('inspections'));
    }
}
