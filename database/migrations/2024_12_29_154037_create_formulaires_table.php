<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formulaires', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Prénom
            $table->string('last_name');  // Nom
            $table->string('subject');    // Objet
            $table->text('description');  // Description
            $table->enum('severity', ['Fiable', 'Moyen', 'Haut']); // Gravité
            $table->timestamps();  // Création et mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaires');
    }
};
