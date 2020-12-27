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
}
