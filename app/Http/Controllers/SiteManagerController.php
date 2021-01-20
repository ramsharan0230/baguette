<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\SiteManager;
use App\Models\Remark;
use Auth;

class SiteManagerController extends Controller
{
    public function index(){
        $inspections = Inspection::where('approvedBy_hygiene', 1)->where('approvedBy_siteman', 0)->orwhere('approvedBy_siteman', 1)
        ->where('approvedBy_sropman', 0)->latest()->get();

        return view('sitemanager.index', compact('inspections'));
    }

    public function approvedBySiteMan($id){
        $ins = Inspection::find($id)->first();
        
        Inspection::find($id)->update(['approvedBy_siteman'=>($ins->approvedBy_siteman==1?0:1)]);

        $message = $ins->approvedBy_siteman==1?"Unapproved Successfully!":"Approved Successfully";
        return redirect()->route("sitemanager")->with('success',$message);
    }

    public function unApprovedBySiteMan(Request $request){
        $this->validate($request,[
            'inspection_id'=>'required|numeric',
            'problem'=>'required|min:2|max:1500'
         ]);

         $insUnapproved = Inspection::where('id', $request->inspection_id)->update(['approvedBy_hygiene'=>0]);

        if($insUnapproved){
            $remark = new Remark();
            $remark->inspection_id = $request->inspection_id;
            $remark->remarks = $request->problem;
            $remark->user_id = Auth::id();
            $remark->save();

            $message = "Unapproved Successfully";
        }else{
            $message = "Sorry!, Something went wrong!";
        }
        
        return redirect()->route("sitemanager")->with('message', $message);
    }

    public function review($id){
        $remark = Remark::where('inspection_id', $id)->get();
        return response()->json(['message' => 'Successfully Approved', 'data'=>$remark, 'state' => 200]);
    }
}
