<?php

namespace Database\Seeders;
use App\Models\Role; // Importez le modèle Role

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
         'name'=>'admin'

        ]);

        Role::create([
            'name'=>'create'

              ]);

              Role::create([
                'name'=>'users'

                  ]);


    }
}
