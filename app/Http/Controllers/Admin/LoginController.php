<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
//     public function __construct()
// {
//     $this->middleware(['is.admin']);
// }
    public function show()
    {
        
        if (!Auth::check()) {
           
            return view('admin.login');
        }
        //  dd(Auth::user()->getRoleNames());
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
