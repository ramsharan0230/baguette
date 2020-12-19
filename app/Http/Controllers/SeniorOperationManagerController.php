<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeniorOperationManagerController extends Controller
{
    public function index(){
        return view('sropmanager.index');
    }
}
