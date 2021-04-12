<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EnseignantController extends Controller
{
    public function showCourse()
    {
        $cours = Cours::query()
            ->join('formations', 'cours.formation_id', '=', 'formations.id')
            ->orderBy('cours.intitule', 'asc')
            ->select('cours.intitule as cours_name', 'formations.intitule as formation_name', 'cours.id as cours_id')
            ->where('user_id', Auth::id())
            ->get();
        return view('enseignant.liste_cours', ['cours' => $cours]);
    }
}
