<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursUser extends Model
{
    use HasFactory;

    public $table = 'cours_users';
    public $timestamps = false;
}
