<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomscategorie','imagescategorie','categorie_id'
    ];

    public function categorie()
        {
        return $this->belongsTo(Categorie::class,"categorie_id");
    }

    // Relation : Une sous-catégorie peut avoir plusieurs produits
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
