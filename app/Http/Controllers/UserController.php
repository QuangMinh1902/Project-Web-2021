<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\CoursUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function goView()
    {
        return view('user.home');
    }

    public function changeInfo()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|alpha|min:2|max:30',
            'prenom' => 'required|alpha|min:2|max:30',
        ]);

        User::where('id', $id)->update([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom']
        ]);
        $request->session()->flash('etat', 'Votre profile a été modifié');
        return redirect()->route('user.home');
    }

    public function changePassword()
    {
        return view('auth.password_reset');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:4|max:16',
            'confirm_password' => 'required|same:new_password'
        ]);

        if (Hash::check($request->old_password, Auth::user()->mdp)) {
            User::where('id', Auth::user()->id)->update([
                'mdp' => Hash::make($request->new_password)
            ]);
            return redirect()->intended('user/home')->with('etat', 'Votre mot de passe a été changé avec succès');
        } else {
            return back()->withErrors([
                'old_password' => 'Old password does not matched.',
            ]);
        }
    }
}
