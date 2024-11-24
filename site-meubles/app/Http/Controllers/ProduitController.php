<?php

namespace App\Http\Controllers;

use App\Models\Produit; // Assure-toi que le modèle Produit est importé
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Affiche la liste des produits
    public function index()
    {
        return Produit::all(); // Renvoie tous les produits
        try {
            $produit=Produit::with('SousCategorie')->get(); // Inclut la sous catégorie liée;
            return response()->json($produit,200);
            } catch (\Exception $e) {
            return response()->json("Sélection impossible {$e->getMessage()}");
            }
    }

    // Crée un nouveau produit
    public function store(Request $request)
    {
        
        try {
            $produit=new Produit([
            "nompro"=> $request->input('nompro'),
            "imagepro"=> $request->input('imagepro'),
            "description"=> $request->input('description'),
            "prix"=> $request->input('prix'),
            "quantite"=> $request->input('quantite'),
            "sous_categorie_id"=> $request->input('sous_categorie_id'),
            ]);
            $produit->save();
            return response()->json($produit);
            
            } catch (\Exception $e) {
            return response()->json("insertion impossible {$e->getMessage()}");
            }
    }

    // Affiche un produit spécifique
    public function show($id)
    {

        try {
            $produit=Produit::findOrFail($id);
            return response()->json($produit);
            } catch (\Exception $e) {
            return response()->json("probleme de récupération des données {$e->getMessage()}");
        }
    }

    // Met à jour un produit spécifique
    public function update(Request $request, $id)
    {

        try {
            $produit=Produit::findorFail($id);
            $produit->update($request->all());
            return response()->json($produit);
            } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    // Supprime un produit spécifique
    public function destroy($id)
    {

        try {
            $produit=Produit::findOrFail($id);
            
            $produit->delete();
            return response()->json("catégorie supprimée avec succes");
            } catch (\Exception $e) {
            return response()->json("probleme de suppression de catégorie {$e->getMessage()}");
        }
    }

    public function showArticlesBySCAT($idscat)
        {
        try {
        $produit= Produit::where('sous_categorie_id', $idscat)->with('sousCategorie')->get();
        return response()->json($produit);
        } catch (\Exception $e) {
        return response()->json("Selection impossible {$e->getMessage()}");
        }
    }

    public function produitPaginate()
        {
        try {
        $perPage = request()->input('pageSize', 2);
        // Récupère la valeur dynamique pour la pagination
        $produit = Produit::with('sousCategorie')->paginate($perPage);
        // Retourne le résultat en format JSON API
        return response()->json([
        'products' => $produit->items(), // Les produits paginés
        'totalPages' => $produit->lastPage(), // Le nombre de pages
        ]);
        } catch (\Exception $e) {
        return response()->json("Selection impossible {$e->getMessage()}");
        }
    }

    public function paginationPaginate()
        {
        $perPage = request()->input('pageSize', 2); // Récupère la valeur dynamique pour la pagination
        // Récupère le filtre par désignation depuis la requête
        $filterDesignation = request()->input('filtre');
        // Construction de la requête
        $query = Produit::with('sousCategorie');
        // Applique le filtre sur la désignation s'il est fourni
        if ($filterDesignation) {
        $query->where('description', 'like', '%' . $filterDesignation . '%');
        }
        // Paginer les résultats après avoir appliqué le filtre
        $produit = $query->paginate($perPage);
        // Retourne le résultat en format JSON API
        return response()->json([
        'products' => $produit->items(), // Les produit paginés
        'totalPages' => $produit->lastPage(), // Le nombre de pages
        ]);

    }





}
