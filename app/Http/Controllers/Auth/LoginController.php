<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth; 

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        $rol = Auth::user()->type_of_user;

        switch ($rol) {
            case 'desarrollador':
                return 'developer';
                break;

            case 'cliente':
                return 'client';
                break;
            
            default:
                return '/home';
                break;
        }

        /*$user = Auth::user();

        if (Auth::check()) {

            if ($user->esAdmin()) {
                
                return true;
            } else {

                return false;
            }
        }*/
    } 

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
