<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Créer des utilisateurs
         $admin = User::create([
            'name' => 'Admin ',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $technician = User::create([
            'name' => 'Technician',
            'email' => 'technician@technician.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);

        // Récupérer les rôles existants et les affecter aux utilisateurs
        $admin->roles()->attach([1, 2]); 
        $user->roles()->attach([3]); // Rattacher le rôle avec l'ID 3 à l'utilisateur
        $technician->roles()->attach([2]); // Rattacher le rôle avec l'ID 2 au technicien
    }
    }

