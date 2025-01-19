<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    use HasFactory;

    /**
     * Les attributs remplissables.
     */
    protected $table = 'formulaires';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'subject',
        'description',
        'severity',
    ];
    /**
     * Relation avec le modèle Liste.
     */


     public function listes()
    {
        return $this->hasOne(Liste::class);
    }


}
