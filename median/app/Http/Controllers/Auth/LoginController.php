<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;

class LoginController extends Controller
{
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
    protected $redirectTo = '/articles';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username() {
        return 'username';
    }
    public function login(Request $request){

        if(Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ])) 
        {
            if (Auth::user()->status == 1) { // active?
               if(Auth::user()->role_id == 1) {  // admin?
                    return redirect('/admin');
                }
                    return redirect('/articles');
            } else {
                Session::flash('newsletter_message.level', 'danger');
                Session::flash('newsletter_message.content', 'Your account is disabled. <br>Send us an email to re-activate your account.');

                Auth::logout(); // force logout from the app
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }


}