<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use DateTime;
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

    public function showPlanning(Request $request)
    {
        $plannings = Cours::query()
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->join('plannings', 'plannings.cours_id', '=', 'cours.id')
            ->where([
                ['cours.user_id', Auth::user()->id],
                [function ($query) use ($request) {
                    if (($term = $request->term)) {
                        $query->orWhere('cours.intitule', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ])
            ->orderBy('cours.intitule', 'asc')
            ->select(
                'cours.id as cours_id',
                'users.nom as user_nom',
                'plannings.date_debut as start',
                'plannings.date_fin as end',
                'cours.intitule as cours_name',
                'users.prenom as user_prenom'
            )
            ->get();
        return view('enseignant.plannings', ['plannings' => $plannings]);
    }

    public function chooseWeek()
    {
        return view('enseignant.form_week');
    }

    public function showCalendar(Request $request)
    {
        $request->validate([
            'week' => 'required|integer|min:1|max:52',
            'year' => 'required|integer|min:2015|max:2030',
        ]);
        $start = new DateTime();
        $end = new DateTime();
        $start->setISODate($request->year, $request->week);
        $end->setISODate($request->year, $request->week);
        $start->format('Y-m-d');
        $end->format('Y-m-d');
        $end->modify('+6 days');
        $plannings = Cours::query()
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->join('plannings', 'plannings.cours_id', '=', 'cours.id')
            ->where('cours.user_id', Auth::user()->id)
            ->whereDate('date_debut', '>=', $start)
            ->whereDate('date_fin', '<=', $end)
            ->orderBy('cours.intitule', 'asc')
            ->select(
                'cours.id as cours_id',
                'users.nom as user_nom',
                'plannings.date_debut as start',
                'plannings.date_fin as end',
                'cours.intitule as cours_name',
                'users.prenom as user_prenom'
            )
            ->get();
        return view('enseignant.form_week', ['plannings' => $plannings]);
    }
}
