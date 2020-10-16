<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show()
    {
        if (!Auth::check()) {
            return view('admin.login');
        }
        return view('admin.main');
    }

    public function login(Request $rq)
    {
        if (Auth::attempt(array('email' => $rq->email, 'password' => $rq->password))) {
            return redirect()->route('admin.main');
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.form-login');
    }
}
