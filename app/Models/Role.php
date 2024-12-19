<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;


class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Définissez les colonnes de votre table 'roles'

    public function users()
    {
        return $this->belongsToMany(User::class,'role_user', 'role_id', 'user_id');
    }

}







