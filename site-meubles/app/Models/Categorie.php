<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
    'nom','image'
    ];

    // Relation : Une catégorie peut avoir plusieurs sous-catégories
    public function sousCategories()
    {
        return $this->hasMany(SousCategorie::class,"categorie_id");
    }
}
