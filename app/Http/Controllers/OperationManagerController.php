<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationManagerController extends Controller
{
    public function index(){
        return view('opmanager.index');
    }
}
