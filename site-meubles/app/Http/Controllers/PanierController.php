<?php


namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\PanierItem;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    // Afficher le contenu du panier
    public function afficherPanier()
    {
        $panier = Panier::with('items.produit')
            ->where('user_id', Auth::id())
            ->first();

        foreach ($panier->items as $item) {
                $produit = $item->produit; // Access the Produit object
                // ...
            }
    }

    // Ajouter un produit au panier
    public function ajouterAuPanier(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1'
        ]);

        $panier = Panier::firstOrCreate(['user_id' => Auth::id()]);

        // Vérifier si le produit est déjà dans le panier
        $item = PanierItem::where('panier_id', $panier->id)
            ->where('produit_id', $request->produit_id)
            ->first();

        if ($item) {
            // Si le produit est déjà présent, on augmente la quantité
            $item->quantite += $request->quantite;
            $item->save();
        } else {
            // Sinon, on ajoute un nouvel article au panier
            $panier->items()->create([
                'produit_id' => $request->produit_id,
                'quantite' => $request->quantite,
            ]);
        }

        return response()->json(['message' => 'Produit ajouté au panier avec succès']);
    }

    // Retirer un produit du panier
    public function retirerDuPanier($id)
    {
        $item = PanierItem::where('panier_id', function($query) {
                $query->select('id')->from('paniers')->where('user_id', Auth::id());
            })
            ->where('id', $id)
            ->first();

        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Produit retiré du panier']);
        }

        return response()->json(['message' => 'Produit introuvable dans le panier'], 404);
    }

    // Vider le panier
    public function viderPanier()
    {
        $panier = Panier::where('user_id', Auth::id())->first();

        if ($panier) {
            $panier->items()->delete();
            return response()->json(['message' => 'Panier vidé avec succès']);
        }

        return response()->json(['message' => 'Panier déjà vide']);
    }
}

