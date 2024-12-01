<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommendeLignies extends Model
{
    protected $fillable = [
        'id_article','prixU','quantite','prixT','id_commende'
    ];
    public function articles()
    { 
        return $this->belongsTo(Articles::class,"id_article"); 
    }
}
