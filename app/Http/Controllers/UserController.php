<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\lapangan;
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
        $kecamatan = Kecamatan::all(); // Ambil semua kecamatan untuk dropdown atau penggunaan lain
        $lapanganCountByKecamatan = Lapangan::select('id_kecamatan')
            ->selectRaw('count(*) as lapangan_count')
            ->groupBy('id_kecamatan')
            ->get()
            ->keyBy('id_kecamatan');
    
        return view('admin.dashboard', compact('kecamatan', 'lapanganCountByKecamatan'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
