<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\User;
use App\Models\Role;

class SeniorOperationManagerController extends Controller
{
    public function index(){
        $inspections = Inspection::where(['approvedBy_hygiene'=>1, 'approvedBy_siteman'=>1, 'approvedBy_opman'=>1])->get();
        return view('sropmanager.index', compact('inspections'));
    }

    public function users(){
        $users = User::latest()->get();
        $roles = Role::latest()->get();
        return view('sropmanager.users', compact('users', 'roles'));
    }

    public function changeRole(Request $request){
        $request->validate([
            'user_id' => 'required|integer',
            'role_id' => 'required|integer',
        ]);
        
        User::find($request->user_id)->update(['role_id'=>$request->role_id]);
        return redirect()->route('sropmanager.users')->with(['success'=>"Role has been updated successfully!!"]);
    }

    public function changeStatus($id){
        $id = (int) $id;
        User::where('id', $id)->update(['approved'=>1]);

        return redirect()->route('sropmanager.users')->with(['success'=>"User has been Approved successfully!!!"]);
    }

    public function unApproveUser($id){
        $id = (int) $id;
        User::where('id', $id)->update(['approved'=>0]);

        return redirect()->route('sropmanager.users')->with(['success'=>"User has been UnApproved successfully!!!"]);
    }

    public function suspendUser($id){
        User::where('id', $id)->update(['suspended'=>'suspended']);

        return redirect()->route('sropmanager.users')->with(['success'=>"User has been Suspended successfully!!!"]);
    }

    public function unSuspendUser($id){
        User::where('id', $id)->update(['suspended'=>'unsuspend']);

        return redirect()->route('sropmanager.users')->with(['success'=>"User has been UnSuspended successfully!!!"]);
    }



    public function approvedBySrOpMan($id){
        Inspection::find($id)->update(['approvedBy_opman'=>1]);
        $message = "Approved Successfully";

        return redirect()->route("opmanager")->with('success', $message);
    }

    public function unApprovedBySrOpMan(Request $request){
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
