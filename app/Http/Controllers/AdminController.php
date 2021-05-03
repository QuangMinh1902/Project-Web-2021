<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\CoursUser;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function comeHome()
    {
        $users = User::query()
        ->join('formations','users.formation_id','=','formations.id')
        ->where('type', null)
        ->select('users.id as id',
                'formations.intitule as formation',
                'formations.id as formation_id',
                'users.nom as nom',
                'users.prenom as prenom'
        )
        ->get();
        return view('admin.liste_users', ['users' => $users]);
    }

    //4.1.2. Acceptation d’un utilisateur
    public function accept(Request $request, $id)
    {
        $type = User::where(['id' => $id])->first()->formation_id;
        if ($type == null) {
            User::query()->where('id', $id)->update(['type' => 'enseignant']);
        } else {
            User::query()->where('id', $id)->update(['type' => 'etudiant']);
        }
        $request->session()->flash('etat', 'Utilisateur est accepté');
        return redirect()->back();
    }

    //4.1.2. Refus d’un utilisateur
    public function refuse($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('etat', 'Utilisateur est refusé');
    }

    // voir liste des enseignants
    public function showTeachers()
    {
        $users = User::query()->select()->where('type', 'enseignant')->get();
        $cours = Cours::all();
        return view('admin.liste_enseignants', ['users' => $users, 'cours' => $cours]);
    }

    // Association d’un enseignant à un cours
    public function associate(Request $request, $id)
    {
        $request->validate([
            'cours_id' => 'required'
        ]);
        $count =  DB::table('cours_users')->where(['cours_id' => $request->cours_id, 'user_id' => $id])->count();
        if ($count > 0) {
            $request->session()->flash('etat', 'Cette utilisateur a été déjà associé à ce cours');
            return redirect()->back();
        } else {
            DB::insert('insert into cours_users (cours_id, user_id) values (?, ?)', [$request->cours_id, $id]);
            $request->session()->flash('etat', 'Association effectuée');
            return redirect()->back();
        }
    }

    public function showDetail($id)
    {
        $user = User::find($id);
        $count = DB::table('cours')->where('user_id', $id)->count();
        if ($count > 0) {
            $intitule = Cours::where(['user_id' => $id])->first()->intitule;
        } else {
            $intitule = null;
        }
        $cours = DB::table('cours_users')
            ->join('cours', 'cours_users.cours_id', '=', 'cours.id')
            ->join('users', 'cours.user_id', '=', 'users.id')
            ->where('cours_users.user_id', $id)
            ->select('cours.*', 'users.*')->get();

        if ($cours->count() < 1) {
            $cours = DB::table('cours')
                ->join('users', 'cours.user_id', '=', 'users.id')
                ->where('user_id', $id)->select('cours.*', 'users.*')->get();
        }
        return view('admin.detail_cours', ['cours' => $cours, 'user' => $user, 'intitule' => $intitule]);
    }

    // 4.2.1. Liste des cours
    public function showCourse(Request $request)
    {
        $cours = Cours::orderBy('cours.intitule', 'asc')
            ->join('formations', 'cours.formation_id', '=', 'formations.id')
            ->join('users', 'cours.user_id', '=', 'users.id')
            ->where([
                [function ($query) use ($request) {
                    if (($term = $request->term)) {
                        $query->orWhere('cours.intitule', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ])
            ->select(
                'cours.id as cours_id',
                'users.nom as user_nom',
                'users.prenom as user_prenom',
                'cours.intitule as cours_name',
                'formations.intitule as formation'
            )
            ->simplePaginate(4);
        $users = User::query()
            ->where('type', '<>', 'admin')
            ->where('type', '<>', 'etudiant')
            ->orderBy('nom', 'asc')
            ->orderBy('prenom', 'asc')
            ->get();
        return view('admin.liste_cours', ['cours' => $cours, 'users' => $users]);
    }

    public function createCours()
    {
        $users = User::query()->select()
            ->where('type', '<>', 'admin')
            ->where('type', '<>', 'etudiant')
            ->orderBy('nom', 'asc')
            ->orderBy('prenom', 'asc')
            ->get();
        return view('admin.createCours', ['users' => $users]);
    }

    public function storeCours(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|min:2|max:50|unique:cours',
            'userID' => 'required|integer',
        ]);

        $cours = new Cours();
        $cours->intitule = $validated['intitule'];
        $cours->user_id = $validated['userID'];
        $cours->save();

        $request->session()->flash('etat', 'Le nouveau cours a été créé');
        return redirect()->route('liste.cours');
    }

    public function showFormation()
    {
        $formations = Formation::simplePaginate(4);;
        return view('admin.liste_formations', ['formations' => $formations]);
    }

    public function createFormation()
    {
        return view('admin.createFormation');
    }

    public function storeFormation(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|min:2|max:50|unique:formations',
        ]);
        $formation = new Formation();
        $formation->intitule = $validated['intitule'];
        $formation->save();
        $request->session()->flash('etat', 'La nouvelle formation a été créé');
        return redirect()->route('liste.formations');
    }

    // 4.2.4. Modification d’un cours.
    public function modifyCourse($id)
    {
        $cours = Cours::findOrFail($id);
        $formations = Formation::query()
            ->select('intitule', 'id')
            ->orderBy('intitule', 'asc')
            ->get();
        $users = User::query()
            ->select()
            ->where('type', 'enseignant')
            ->orderBy('nom', 'asc')
            ->get();
        return view('admin.update_course', ['cours' => $cours, 'formations' => $formations, 'users' => $users]);
    }

    public function updateCourse(Request $request, $id)
    {
        $validated = $request->validate([
            'cours' => 'required|string',
            'user' => 'required|integer',
            'formation' => 'required|integer'
        ]);

        Cours::where('id', $id)->update([
            'intitule' => $validated['cours'],
            'user_id' => $validated['user'],
            'formation_id' => $validated['formation']
        ]);
        $request->session()->flash('etat', 'Modification effectuée');
        return redirect()->route('liste.cours');
    }

    // 4.2.5. Suppression d’un cours.
    public function deleteCourse(Request $request, $id)
    {
        $nom = Cours::where(['id' => $id])->first()->intitule;
        $cours = Cours::find($id);
        $cours->delete();
        CoursUser::where('cours_id', $id)->delete();
        $request->session()->flash('etat', 'Le cours ' . $nom . ' a été supprimé');
        return redirect()->back();
    }

    // 4.2.6. Association d’un enseignant à un cours
    public function associerCours(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required'
        ]);
        $count =  DB::table('cours_users')->where(['cours_id' => $id, 'user_id' => $request->user_id])->count();
        if ($count > 0) {
            $request->session()->flash('etat', 'Cette utilisateur a été déjà associé à ce cours');
            return redirect()->back();
        } else {
            DB::insert('insert into cours_users (cours_id, user_id) values (?, ?)', [$id, $request->user_id]);
            $request->session()->flash('etat', 'Association effectuée');
            return redirect()->back();
        }
    }

    // 4.2.7. Liste des cours par enseignant
    public function listeEnseignant()
    {
        $enseignants = User::query()
            ->where('type', '=', 'enseignant')
            ->orderBy('nom', 'asc')
            ->orderBy('prenom', 'asc')
            ->get();
        return view('admin.cours_enseignants', ['enseignants' => $enseignants]);
    }

    public function detailCours($id)
    {
        $cours = Cours::query()
            ->join('formations', 'formations.id', '=', 'cours.formation_id')
            ->join('users', 'users.id', '=', 'cours.user_id')
            ->where('cours.id', $id)
            ->orderBy('cours.intitule', 'asc')
            ->select(
                'cours.intitule as cours',
                'formations.intitule as formation ',
                'users.nom as nom',
                'users.prenom as prenom',
            )
            ->get();
        return view('admin.liste_cours_enseignant', ['cours' => $cours]);
    }
}
