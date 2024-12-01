<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'nom','prenom','adresse','telephone','etat'
    ];
}
