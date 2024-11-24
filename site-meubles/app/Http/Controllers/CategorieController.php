<?php

namespace App\Http\Controllers;

use App\Models\Categorie; // Assure-toi que le modèle Categorie est importé
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Affiche la liste des catégories
    public function index()
    {
        try 
        {
            $categories=Categorie::all();
            return response()->json($categories);
        } 
        catch (\Exception $e)
        {
        return response()->json("probleme de récupération de la liste des catégories");
        }
        
    }

    // Crée une nouvelle catégorie
    public function store(Request $request)
    {

        try {
            $categorie=new Categorie([
            "nom"=>$request->input("nom"),
            "image"=>$request->input("image")
            ]);
            $categorie->save();
            return response()->json($categorie);

        } catch (\Exception $e) {
            return response()->json("insertion impossible");
        }

    }

    // Affiche une catégorie spécifique
    public function show($id)
    {
        
        try {
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);
            } catch (\Exception $e) {
            return response()->json("probleme de récupération des données");
        }



    }

    // Met à jour une catégorie spécifique
    public function update(Request $request, $id)
    {
        try {
            $categorie=Categorie::findorFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
            } catch (\Exception $e) {
            return response()->json("probleme de modification");
        }
    }

    // Supprime une catégorie spécifique
    public function destroy($id)
    {
         try {
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("catégorie supprimée avec succes");
            } catch (\Exception $e) {
            return response()->json("probleme de suppression de catégorie");
        }

    }
}
