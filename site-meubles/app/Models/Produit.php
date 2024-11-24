<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nompro', 'description', 'prix', 'quantite','imagepro', 'sous_categorie_id'];

    // Relation : Un produit appartient à une sous-catégorie
    public function sousCategorie()
    {
        return $this->belongsTo(SousCategorie::class,'sous_categorie_id');
    }
}
