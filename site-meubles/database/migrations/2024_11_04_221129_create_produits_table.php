<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nompro');
            $table->string('imagepro',255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('prix', 8, 2);
            $table->integer('quantite')->default(0);
            $table->foreignId('sous_categorie_id')->constrained()->onDelete('cascade'); // Clé étrangère vers sous-catégories
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
