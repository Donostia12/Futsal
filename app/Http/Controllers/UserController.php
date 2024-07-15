<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
      
    return view('admin.login');
    }
    
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dashboard');
         
        } else {
            return back()->with('error', 'Invalid login credentials');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
