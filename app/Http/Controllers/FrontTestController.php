<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class FrontTestController extends Controller
{
    public function info(){
        return view('test');
    }

    public function createImage(Request $request){
        // dd($request->base64data);

        $image = $request->base64data; 
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10).'.'.'jpeg';
        \File::put(public_path('images/testfiles'). '/' . $imageName, base64_decode($image));
    }
}
