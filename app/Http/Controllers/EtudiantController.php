<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cours;
use App\Models\CoursUser;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    // 1.1. Voir la liste des cours de la formation
    public function showCourse(Request $request)
    {
        $cours =  Cours::query()
            ->join('formations', 'formations.id', '=', 'cours.formation_id')
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->where([
                ['cours.formation_id', Auth::user()->formation_id],
                [function ($query) use ($request) {
                    if (($term = $request->term)) {
                        $query->orWhere('cours.intitule', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ])
            ->orderBy('cours.intitule', 'asc')
            ->select(
                'cours.id as cours_id',
                'users.nom as nom',
                'cours.intitule as cours_name',
                'users.prenom as prenom'
            )
            ->get();
        return view('etudiant.formation_cours', ['cours' => $cours]);
    }

    // 1.2.1. Inscription dans un cours.
    public function registerCourse($id)
    {
        DB::insert('insert into cours_users (cours_id, user_id) values (?, ?)', [$id, Auth::id()]);
        return back()->with('etat', 'Inscription avec succès');
    }

    // 1.2.2. Désinscription d’un cours.
    public function unsubscribe($id)
    {
        CoursUser::where(['cours_id' => $id, 'user_id' => Auth::id()])->delete();
        return back()->with('etat', 'Déinscription avec succès');
    }

    // 1.2.3. Liste des cours auxquels l’étudiant est inscrit
    public function afficherInscription()
    {
        $cours =  Cours::query()
            ->join('cours_users', 'cours_users.cours_id', '=', 'cours.id')
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->where(['cours_users.user_id' => Auth::id()])
            ->orderBy('cours.intitule', 'asc')
            ->select('cours.id as cours_id', 'users.nom as user_nom', 'cours.intitule as cours_name', 'users.prenom as user_prenom')
            ->get();
        return view('etudiant.liste_inscription', ['cours' => $cours]);
    }

    //1.3.1. Voir l'intégral du plannings
    public function showIntegral(Request $request)
    {
        $plannings = Cours::query()
            ->join('cours_users', 'cours_users.cours_id', '=', 'cours.id')
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->join('plannings', 'plannings.cours_id', '=', 'cours.id')
            ->where([
                ['cours_users.user_id', Auth::user()->id],
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
        return view('etudiant.plannings_integral', ['plannings' => $plannings]);
    }

    public function inputWeek()
    {
        return view('etudiant.form_week');
    }

    public function showWeek(Request $request)
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
            ->join('cours_users', 'cours_users.cours_id', '=', 'cours.id')
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->join('plannings', 'plannings.cours_id', '=', 'cours.id')
            ->where(['cours_users.user_id' => Auth::id()])
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
        return view('etudiant.form_week', ['plannings' => $plannings]);
    }
}
