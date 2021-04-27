<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Planning;
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
            ->where('cours.user_id', Auth::id())
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

    public function afficheSeance()
    {
        $plannings = Cours::query()
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->join('plannings', 'plannings.cours_id', '=', 'cours.id')
            ->join('cours_users', 'cours_users.cours_id', '=', 'cours.id')
            ->where('cours_users.user_id', Auth::id())
            ->orWhere('cours.user_id', Auth::id())
            ->orderBy('cours.intitule', 'asc')
            ->select(
                'cours.id as cours_id',
                'users.nom as user_nom',
                'plannings.date_debut as start',
                'plannings.date_fin as end',
                'cours.intitule as cours_name',
                'users.prenom as user_prenom',
                'plannings.id as id'
            )
            ->get();
        return view('enseignant.myPlanning', ['plannings' => $plannings]);
    }

    // 2.3.1. Création d’une nouvelle séance de cours
    public function CreerSeance()
    {
        $cours = Cours::query()
            ->join('cours_users', 'cours_users.cours_id', '=', 'cours.id')
            ->where('cours_users.user_id', Auth::id())
            ->orWhere('cours.user_id', Auth::id())
            ->orderBy('intitule', 'asc')
            ->get();
        return view('enseignant.ajout_seance', ['cours' => $cours]);
    }

    // 2.3.1. Création d’une nouvelle séance de cours
    public function storeSeance(Request $request)
    {
        $request->validate([
            'cours_id' => 'required|integer',
            'start' => 'required|date_format:Y-m-d H:i:s',
            'end' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $planning = new Planning();
        $planning->cours_id = $request->cours_id;
        $planning->date_debut = $request->start;
        $planning->date_fin = $request->end;
        $planning->save();

        $request->session()->flash('etat', 'La nouvelle séance a été créée');
        return redirect()->route('gestion.planning');
    }

    // 2.3.2. Mise à jour d’une séance de cours
    public function modifierSeance($id)
    {
        $planning = Planning::findOrFail($id);
        $cours = Cours::query()
            ->join('plannings', 'plannings.cours_id', '=', 'cours.id')
            ->join('cours_users', 'cours_users.cours_id', '=', 'cours.id')
            ->where('cours_users.user_id', Auth::id())
            ->orWhere('cours.user_id', Auth::id())
            ->orderBy('cours.intitule', 'asc')
            ->select('cours.intitule','cours.id')
            ->distinct()
            ->get();
        return view('enseignant.update_seance', ['planning' => $planning, 'cours' => $cours]);
    }

    public function updateSeance(Request $request, $id)
    {
        $validated = $request->validate([
            'cours_id' => 'required|integer',
            'start' => 'required|date_format:Y-m-d H:i:s',
            'end' => 'required|date_format:Y-m-d H:i:s'
        ]);

        Planning::where('id', $id)->update([
            'cours_id' => $validated['cours_id'],
            'date_debut' => $validated['start'],
            'date_fin' => $validated['end']
        ]);

        $request->session()->flash('etat', 'Modification effectuée');
        return redirect()->route('gestion.planning');
    }
}
