<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function login_action(Request $request)
    {
        $item = $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt($item)) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
        }
        if (Auth::guard('pelanggan')->attempt($item)) {
            $request->session()->regenerate();
            return redirect()->intended('/user');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function indexRegistrasi() {
        Pelanggan::all();
        return view('auth.registrasi');
    }

    public function postRegistrasi(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'password'=> 'required',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login');
    }
}
