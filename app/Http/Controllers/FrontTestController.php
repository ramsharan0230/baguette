<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontTestController extends Controller
{
    public function info(){
        return view('test');
    }
}
