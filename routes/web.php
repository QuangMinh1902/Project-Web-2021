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

// 4. Partie l’administrateur :
Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function () {
    // Page admin
    Route::get('/home', [AdminController::class, 'comeHome']);

    // accepter un utilisateur
    Route::get('/accept/{id}', [AdminController::class, 'accept'])->name('admin.accept');

    //refuser un utilisateur
    Route::get('/refuse/{id}', [AdminController::class, 'refuse'])->name('admin.refuse');

    // liste des enseignants
    Route::get('/enseignants', [AdminController::class, 'showTeachers'])->name('liste.enseignants');

    // 4.1.3. Association d’un enseignant à un cours
    Route::get('/associer/enseignants/{id}', [AdminController::class, 'associate'])->name('admin.associate');

    // voir les cours que l'utilisateur a participé
    Route::get('/detail/cours/{id}', [AdminController::class, 'showDetail'])->name('detail.cours');

    // 4.2.1 voir liste des cours
    Route::get('/cours', [AdminController::class, 'showCourse'])->name('liste.cours');

    // 4.2.3. Création d’un cours
    Route::get('/create/coours', [AdminController::class, 'createCours'])->name('create.cours');
    Route::post('/store/coours', [AdminController::class, 'storeCours'])->name('store.cours');

    //4.3.1. Liste des formations
    Route::get('/formations', [AdminController::class, 'showFormation'])->name('liste.formations');

    //4.3.2. création d’une formation
    Route::get('/create/formation', [AdminController::class, 'createFormation'])->name('create.formation');
    Route::post('/store/formation', [AdminController::class, 'storeFormation'])->name('store.formation');
});

//  Partie l’utilisateur :
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
});
