<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $item = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($item)) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
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
}