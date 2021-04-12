<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function formLogin()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string',
        ]);

        $credentials = [
            'login' => $request->input('login'),
            'password' => $request->input('mdp')
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->type === 'admin') {
                return redirect()->intended('admin/home')->with('etat', 'Connection avec succès');
            } else {
                return redirect()->intended('user/home')->with('etat', 'Connection avec succès');
            }
        }
        return back()->with('etat', 'Login or password is not correct');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
