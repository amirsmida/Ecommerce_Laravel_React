<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{

    //
    public function items()
        {
            return $this->hasMany(PanierItem::class);
        }
        
}
