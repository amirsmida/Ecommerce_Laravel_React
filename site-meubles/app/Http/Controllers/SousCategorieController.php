<?php

namespace App\Http\Controllers;

use App\Models\SousCategorie; // Assure-toi que le modèle SousCategorie est importé
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    // Affiche la liste des sous-catégories
    public function index()
    {
        
        try {
            $SousCategorie=SousCategorie::with('categorie')->get(); // Inclut la catégorie liée;
            return response()->json($SousCategorie,200);
            } catch (\Exception $e) {
            return response()->json("Sélection impossible {$e->getMessage()}");
        }



    }

    // Crée une nouvelle sous-catégorie
    public function store(Request $request)
    {
    try {
    $souscategorie=new SousCategorie([
    "nomscategorie"=>$request->input("nomscategorie"),
    "imagescategorie"=>$request->input("imagescategorie"),
    "categorie_id"=>$request->input("categorie_id")
    ]);
    $souscategorie->save();
    return response()->json($souscategorie);
    } catch (\Exception $e) {
    return response()->json("insertion impossible {$e->getMessage()}");
    }
    }
    // Affiche une sous-catégorie spécifique
    public function show($id)
    {

        try {
            $sousCategorie=SousCategorie::with('categorie')->findOrFail($id);
            return response()->json($sousCategorie);
            } catch (\Exception $e) {
            return response()->json("Sélection impossible {$e->getMessage()}");
            }
    }

    // Met à jour une sous-catégorie spécifique
    public function update(Request $request, $id)
    {
        

        try {
            $sousCategorie=SousCategorie::findorFail($id);
            $sousCategorie->update($request->all());
            return response()->json($sousCategorie);
            } catch (\Exception $e) {
            return response()->json("Modification impossible {$e->getMessage()}");
            }
    }

    // Supprime une sous-catégorie spécifique
    public function destroy($id)
    {
         try {
            $sousCategorie=SousCategorie::findOrFail($id);
            $sousCategorie->delete();
            return response()->json("Sous catégorie supprimée avec succes");
            } catch (\Exception $e) {
            return response()->json("Suppression impossible {$e->getMessage()}");
            }
    }

    public function showSCategorieByCAT($idcat)
        {
        try {
        $sousCategorie= SousCategorie::where('categorie_id', $idcat)->with('categorie')->get();
        return response()->json($sousCategorie);
        } catch (\Exception $e) {
        return response()->json("Selection impossible {$e->getMessage()}");
        }
    }
}
