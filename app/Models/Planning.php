<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    public $table = 'plannings';
    protected $fillable = [
        'cours_id', 'date_debut', 'date_fin'
    ];
}
