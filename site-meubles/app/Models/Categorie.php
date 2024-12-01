<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'logo', 'etat','id_categorie'
    ];
    public function categoriesParnt(){
        return $this->belongsTo(Categorie::class,'id_categorie');
    }
    public function categArticles(){
        return $this->belongsTo(Articles::class,'id_categorie');
    }
}
