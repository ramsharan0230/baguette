<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    public function authenticated()
    {
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

        return redirect('/home');
    }


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
