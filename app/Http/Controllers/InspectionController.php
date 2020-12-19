<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function index(){
        return view('hygiene.index');
    }

    public function store(Request $request){
        return $request->all();
    }
}
