<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function showFormS()
    {
        $formations = Formation::query()->orderBy('intitule', 'asc')->get();
        return view('auth.register_student', ['formations' => $formations]);
    }

    public function showFormT()
    {
        return view('auth.register_teacher');
    }

    public function chooseRole()
    {
        return view('auth.role');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'nom' => 'required|alpha|min:2|max:20',
            'prenom' => 'required|alpha|min:2|max:20',
            'login' => 'required|string|min:2|max:16|unique:users',
            'mdp' => 'required|string|min:2|max:16|confirmed',
            'formation_id' => 'required|integer'
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->formation_id = $request->formation_id;
        $user->save();

        $request->session()->flash('etat', 'Votre compte a été créé avec succès');

        Auth::login($user);

        return redirect()->route('login');
    }

    public function storeTeacher(Request $request)
    {
        $request->validate([
            'nom' => 'required|alpha|min:2|max:20',
            'prenom' => 'required|alpha|min:2|max:20',
            'login' => 'required|string|min:2|max:16|unique:users',
            'mdp' => 'required|string|min:2|max:16|confirmed',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->save();

        $request->session()->flash('etat', 'Votre compte a été créé avec succès');

        Auth::login($user);

        return redirect()->route('login');
    }
}
