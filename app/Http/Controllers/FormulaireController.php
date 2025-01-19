<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulaire;
use App\Notifications\NewFormulaireNotification;
use Illuminate\Support\Facades\Notification;

class FormulaireController extends Controller
{

    public function index()
{
    // Récupérer tous les formulaires
    $formulaires = Formulaire::all();
    return view('formulaires.index', compact('formulaires'));
}

public function show($id)
{
    try {
        // Trouver le formulaire par ID
        $formulaire = Formulaire::findOrFail($id);

        // Retourner les détails sous forme JSON
        return response()->json($formulaire, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Incident non trouvé.'], 404);
    }
}

    /**
     * Stocker les données soumises par le formulaire.
     */
    public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'subject'    => 'required|string|max:255',
            'description'=> 'required|string',
            'severity'   => 'required|string|in:Fiable,Moyen,Haut',
        ]);

        // Créer un nouvel enregistrement
        $formulaire = Formulaire::create($validated);
        // Retourner une réponse JSON ou rediriger
        return response()->json([
            'message' => 'Formulaire soumis avec succès.',
            'data' => $formulaire,
        ], 201);
    }

     public function update(Request $request, $id)
        {
            // Trouver le formulaire par ID
            $formulaire = Formulaire::findOrFail($id);

            // Mettre à jour les attributs du formulaire
            $formulaire->update($request->all());

            // Rediriger après la mise à jour
            return redirect()->route('formulaires.index')->with('success', 'Formulaire mis à jour avec succès');
        }

public function destroy($id)
{
    $formulaire = Formulaire::findOrFail($id);// Trouver l'élément
    $formulaire->delete(); // Supprimer l'élément
    return redirect()->route('formulaires.index')->with('success', 'Incident supprimé avec succès.');
}
}
