<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $table = 'users';

    public $timestamps = false;

    protected $hidden = ['mdp'];

    protected $fillable = ['login', 'mdp', 'type', 'formation_id', 'nom', 'prenom'];

    public function getAuthPassword()
    {
        return $this->mdp;
    }

    public function cours()
    {
        return $this->belongsToMany(Cours::class);
    }

    public function isAdmin()
    {
        return $this->type == 'admin';
    }

    public function isEtudiant()
    {
        return $this->type == 'etudiant';
    }

    public function isEnseignant()
    {
        return $this->type == 'enseignant';
    }
}
