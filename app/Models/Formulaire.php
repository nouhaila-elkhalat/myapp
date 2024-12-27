<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formulaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'objet',
        'description',
        'gravite',
    ];
}
