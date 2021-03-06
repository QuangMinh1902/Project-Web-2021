<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login
Route::get('/login', [AuthenticatedSessionController::class, 'formLogin']);
Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');

//logout
Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Création du compte pour les utilisateurs
Route::get('/role', [RegisterUserController::class, 'chooseRole'])->name('role'); //choisir le rôle

// étudiant
Route::get('/register/student', [RegisterUserController::class, 'showFormS'])->name('isStudent');

// enseignant
Route::get('/register/teacher', [RegisterUserController::class, 'showFormT'])->name('isTeacher');

// enregistrer dans la base de donnée.
Route::post('/store/student', [RegisterUserController::class, 'storeStudent'])->name('store.student');
Route::post('/store/teacher', [RegisterUserController::class, 'storeTeacher'])->name('store.teacher');

// 4. Partie d’administrateur :
Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function () {
    // Page admin
    Route::get('/home', [AdminController::class, 'comeHome'])->name('admin.home');

    // accepter un utilisateur
    Route::get('/accept/{id}', [AdminController::class, 'accept'])->name('admin.accept');

    //refuser un utilisateur
    Route::get('/refuse/{id}', [AdminController::class, 'refuse'])->name('admin.refuse');

    // liste des enseignants
    Route::get('/enseignants', [AdminController::class, 'showTeachers'])->name('liste.enseignants');

    // 4.1.3. Association d’un enseignant à un cours
    Route::get('/associer/enseignants/{id}', [AdminController::class, 'associate'])->name('admin.associate');

    // voir les cours que l'utilisateur a participé
    Route::get('/voir/cours/{id}', [AdminController::class, 'showDetail'])->name('voir.detail');

    // 4.2.1 voir liste des cours
    Route::get('/cours', [AdminController::class, 'showCourse'])->name('liste.cours');

    // 4.2.3. Création d’un cours
    Route::get('/create/coours', [AdminController::class, 'createCours'])->name('create.cours');
    Route::post('/store/coours', [AdminController::class, 'storeCours'])->name('store.cours');

    // 4.2.4. Modification d’un cours
    Route::get('/admin/modification/seance/{id}', [AdminController::class, 'modifyCourse'])->name('modifier.cours');
    Route::put('/admin/update/seance/{id}', [AdminController::class, 'updateCourse'])->name('cours.update');

    // 4.2.5. Suppression d’un cours.
    Route::delete('/suppression/cours/{id}', [AdminController::class, 'deleteCourse'])->name('suppression.cours');

    // 4.2.6. Association d’un enseignant à un cours
    Route::get('/associer/cours/{id}', [AdminController::class, 'associerCours'])->name('associer.cours');

    // 4.2.7. Liste des cours par enseignant
    Route::get('/enseignant/cours', [AdminController::class, 'listeEnseignant'])->name('enseignant.cours');
    Route::get('/detail/cours/{id}', [AdminController::class, 'detailCours'])->name('cours.detail');

    //4.3.1. Liste des formations
    Route::get('/formations', [AdminController::class, 'showFormation'])->name('liste.formations');

    //4.3.2. création d’une formation
    Route::get('/create/formation', [AdminController::class, 'createFormation'])->name('create.formation');
    Route::post('/store/formation', [AdminController::class, 'storeFormation'])->name('store.formation');

    // 4.3.3. Modification d’une formation
    Route::get('/admin/modification/formation/{id}', [AdminController::class, 'modifierFormation'])->name('modifier.formation');
    Route::put('/admin/update/formation/{id}', [AdminController::class, 'updateFormation'])->name('formation.update');

    // 4.3.4. Suppression d’une formation
    Route::delete('/suppression/formation/{id}', [AdminController::class, 'supprimerFormation'])->name('suppression.formation');
});

//  Partie d’utilisateur :
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    // Page user
    Route::get('/home', [UserController::class, 'goView'])->name('user.home');

    // Profile
    Route::get('/profile', [UserController::class, 'changeInfo'])->name('user.profile');

    //update profile
    Route::post('/update/{id}', [UserController::class, 'updateProfile'])->name('update.profile');

    // changement du mot de passe
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('change_password');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update_password');
});

// Partie d'étudiants :
Route::group(['prefix' => 'etudiant', 'middleware' => ['is_etudiant']], function () {

    // 1.1. Voir la liste des cours de la formation (dans laquelle l’étudiant est inscrit).
    Route::get('/formation/cours', [EtudiantController::class, 'showCourse'])->name('list.course');

    //1.2.1. Inscription dans un cours.
    Route::get('/inscription/cours/{id}', [EtudiantController::class, 'registerCourse'])->name('inscription');

    //1.2.2. Désinscription d’un cours
    Route::get('/désinscription/cours/{id}', [EtudiantController::class, 'unsubscribe'])->name('désinscription');

    // 1.2.3. Liste des cours auxquels l’étudiant est inscrit
    Route::get('/liste/inscription', [EtudiantController::class, 'afficherInscription'])->name('liste.inscription');

    //1.3.1. Voir l'intégral du plannings
    Route::get('/plannings/integral', [EtudiantController::class, 'showIntegral'])->name('plannings.integral');

    //1.3.3. Voir le planning par semaine
    Route::get('/semaine/year', [EtudiantController::class, 'inputWeek'])->name('plannings.semaine');
    Route::get('/plannings/semaine', [EtudiantController::class, 'showWeek'])->name('affiche.semaine');
});

// Partie d'enseignant :
Route::group(['prefix' => 'etudiant', 'middleware' => ['is_enseignant']], function () {
    //2.1. Voir la liste des cours dont on est responsable
    Route::get('/liste/cours', [EnseignantController::class, 'showCourse'])->name('responsable.cours');

    // 2.2. Voir le planning personnalisé
    // 2.2.1. Intégral.
    Route::get('/plannings', [EnseignantController::class, 'showPlanning'])->name('enseignant.plannings');

    // 2.2.3. Par semaine
    Route::get('/enseignant/semaine/year', [EnseignantController::class, 'chooseWeek'])->name('week');
    Route::get('//enseignant/plannings/semaine', [EnseignantController::class, 'showCalendar'])->name('show.plannings');

    // 2.3. Gestion du planning
    Route::get('/enseignant/gestion/planning', [EnseignantController::class, 'afficheSeance'])->name('gestion.planning');

    // 2.3.1. Création d’une nouvelle séance de cours
    Route::get('/enseignant/ajout/seance', [EnseignantController::class, 'CreerSeance'])->name('ajout.seance');
    Route::post('/store/seance', [EnseignantController::class, 'storeSeance'])->name('store.seance');

    // 2.3.2. Mise à jour d’une séance de cours
    Route::get('/enseignant/modification/seance/{id}', [EnseignantController::class, 'modifierSeance'])->name('modifier.seance');
    Route::put('/enseignant/update/seance/{id}', [EnseignantController::class, 'updateSeance'])->name('seance.update');

    // 2.3.3. Suppression d’une séance de cours
    Route::delete('/suppression/seance/{id}', [EnseignantController::class, 'SupprimerSeance'])->name('suppression.seance');
});
