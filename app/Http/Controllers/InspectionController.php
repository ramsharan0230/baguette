<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Carbon\Carbon;
use App\Models\Inspection;
use App\Models\Picture;
use App\Models\Remark;
use Auth;

class InspectionController extends Controller
{
    public function index(){
        $inspections = Inspection::latest()->get();
        return view('hygiene.index', compact('inspections'));
    }

    public function store(Request $request){
        $request->validate([
            'location' => 'required',
            'start_date' => 'required',
            'findings' => 'required|max:10000',
            'pca' => 'required|max:10000',
            'accountibility' => 'required|max:299',
            'status' => 'required',
            'closing_date' => 'max:50'
        ]);
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        Inspection::create($data);

        return redirect()->route('inspection.index')->with('success', 'Inspection has been added Successfully');;
    }

    public function editLocation(Request $request){
        $request->validate([
            'editId' => 'required|integer',
            'editLocation' => 'required'
        ]);

        Inspection::find($request->editId)->update(['location'=>$request->editLocation]);

        return redirect()->route('inspection.index');
    }

    public function editDate(Request $request){
        $request->validate([
            'editId' => 'required|integer',
            'editDate' => 'required'
        ]);
        Inspection::find($request->editId)->update(['start_date'=>$request->editDate]);

        return redirect()->route('inspection.index');
    }

    public function editFindings(Request $request){
        $request->validate([
            'editId' => 'required|integer',
            'editFindings' => 'required'
        ]);

        Inspection::find($request->editId)->update(['findings'=>$request->editFindings]);

        return redirect()->route('inspection.index');
    }

    public function editPca(Request $request){
        $request->validate([
            'editPcaId' => 'required|integer',
            'editPca' => 'required'
        ]);

        Inspection::find($request->editPcaId)->update(['pca'=>$request->editPca]);

        return redirect()->route('inspection.index');
    }

    public function editAccountability(Request $request){
        $request->validate([
            'editAccountabilityId' => 'required|integer',
            'editAccountability' => 'required'
        ]);

        Inspection::find($request->editAccountabilityId)->update(['accountibility'=>$request->editAccountability]);

        return redirect()->route('inspection.index');
    }

    public function editStatus(Request $request){
        $request->validate([
            'editStatusId' => 'required|integer',
            'editStatus' => 'required'
        ]);

        Inspection::find($request->editStatusId)->update(['status'=>$request->editStatus]);

        return redirect()->route('inspection.index');
    }

    public function editClosingDate(Request $request){
        $request->validate([
            'editClosingDateId' => 'required|integer',
            'editClosingDate' => 'required'
        ]);

        Inspection::find($request->editClosingDateId)->update(['closing_date'=>$request->editClosingDate]);
        return redirect()->route('inspection.index');
    }

    public function approveInspection($id){
        Inspection::find($id)->update(['approvedBy_hygiene'=>1]);

        return redirect()->route("inspection.index")->with('success','Inspection Approved successfully!');
    }

    public function assignInspection($id){
        Inspection::find($id)->update(['approved'=>1]);

        return response()->json(['message' => 'Successfully Approved', 'state' => 200]);
    }

    public function takeImage($id){
        // dd($id);
        return view('hygiene.take-picture', compact('id'));
    }

    public function postTakenImage(Request $request){
        $request->validate([
            'picture' => 'required|min:1000',
            'id' => 'required'
        ]);
        $data = $request->all();

        if($request->picture){
            $image = $request->picture; 
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10).'.'.'jpeg';
            \File::put(public_path('images/inspection_files'). '/' . $imageName, base64_decode($image));
        }
        $data['picture'] = $imageName;
        $id = $request->id;

        $picture = new Picture();
        $picture->name = $imageName;
        $picture->inspection_id = $id;
        $picture->save();

        if($picture)
            return response()->json(['message' => 'Successfully updated Picture', 'status' => 200]);
    }

    public function deleteIns($id){
        $remark = Remark::where('inspection_id', $id)->delete();
        $picture = Picture::where('inspection_id', $id)->delete();
        $picture = Inspection::where('id', $id)->delete();

        return redirect()->route("inspection.index")->with('error','Inspection has been deleted successfully!');
    }

    public function review($id){
        $remark = Remark::where('inspection_id', $id)->get();
        return response()->json(['message' => 'Successfully Approved', 'data'=>$remark, 'state' => 200]);
    }
}
