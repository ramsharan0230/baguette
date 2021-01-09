<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\Remark;
use Auth;

class OperationManagerController extends Controller
{
    public function index(){
        $inspections = Inspection::where(['approvedBy_hygiene'=>1, 'approvedBy_siteman'=>1])->get();

        return view('opmanager.index', compact('inspections'));
    }

    public function approvedByOpMan($id){
        Inspection::find($id)->update(['approvedBy_opman'=>1]);
        $message = "Approved Successfully";

        return redirect()->route("opmanager")->with('success', $message);
    }

    public function unApprovedByOpMan(Request $request){
        $insUnapproved = Inspection::find($request->editId)->update(['approvedBy_opman'=>0]);
        if($insUnapproved){
            $remark = new Remark();
            $remark->inspection_id = $request->editId;
            $remark->remarks = $request->problem;
            $remark->user_id = Auth::id();
            $remark->save();
        }
        
        return redirect()->route("opmanager")->with('error', "Unapproved Successfully!");
    }
}
