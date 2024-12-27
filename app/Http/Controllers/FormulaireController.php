<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulaireController extends Controller
{
    // Méthode pour afficher le formulaire (si nécessaire)
    public function create()
    {
        return view('form.index');
    }

    // Méthode pour enregistrer le formulaire dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'objet' => 'required|string|max:255',
            'description' => 'required|string',
            'gravite' => 'required|in:Fiable,Moyen,Haut',
        ]);

        // Sauvegarde dans la base de données
        Formulaire::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'objet' => $request->objet,
            'description' => $request->description,
            'gravite' => $request->gravite,
        ]);

        // Redirection après l'enregistrement avec un message de succès
        return redirect()->route('form.index')->with('success', 'Formulaire soumis avec succès!');
    }
}
