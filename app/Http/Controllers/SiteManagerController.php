<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\SiteManager;

class SiteManagerController extends Controller
{
    public function index(){
        $inspections = Inspection::where('approvedBy_hygiene', 1)->get();

        return view('sitemanager.index', compact('inspections'));
    }

    public function approvedBySiteMan($id){
        Inspection::find($id)->update(['approvedBy_siteman'=>1]);

        return redirect()->route("sitemanager")->with('success','Inspection Approved successfully!');
    }
}
