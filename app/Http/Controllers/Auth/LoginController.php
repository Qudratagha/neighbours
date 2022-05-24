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
//    protected $redirectTo = RouteServiceProvider::HOME;


    protected function redirectTo(){
        // User role
        $role = Auth::user()->roles->pluck('name')->last();

        // Check user role
        switch ($role) {
            case 'Super Admin':
                return '/dashboard';
                break;
            case 'Cow Supervisor':
                return '/cattle/cow';
                break;
            case 'Poultry Supervisor':
                return '/poultry';
                break;
            default:
                return '/login';
                break;
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
