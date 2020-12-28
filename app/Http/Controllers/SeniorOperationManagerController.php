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

    public function changeStatus(Request $request, $id){
        $user = User::findOrFail($id)->first();
        dd($user);
        User::find($user->id)->update(['approved'=>$user->approved==0?1:0]);

        return response()->json(['message'=>"Role has been updated successfully!!", 'status'=>200]);
    }
}
