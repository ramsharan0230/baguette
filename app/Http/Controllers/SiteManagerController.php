<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\SiteManager;

class SiteManagerController extends Controller
{
    public function index(){
        $inspections = Inspection::where('approved', 1)->get();
        return view('sitemanager.index', compact('inspections'));
    }
}
