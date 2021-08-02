<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role('user'))
        {
            $signedInUser = Auth::user();
            return view('home', compact('signedInUser'));
        }

        if(auth()->user()->role('hygiene'))
        {
            return redirect('/hygiene');
        } 

        if(auth()->user()->role('sitemanager'))
        {
            return redirect('/sitemanager');
        } 

        if(auth()->user()->role('OpManager'))
        {
            return redirect('/opmanager');
        } 

        if(auth()->user()->role('sropmanager'))
        {
            return redirect('/sropmanager');
        } 
    }
}
