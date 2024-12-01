<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'logo', 'description','prix','id_categorie','etat'
    ];
    public function categories(){
        return $this->belongsTo(Categories::class,'id_categorie');
    } 
}
