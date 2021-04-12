<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    public $table = 'cours';

    protected $fillable = ['intitule', 'user_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
