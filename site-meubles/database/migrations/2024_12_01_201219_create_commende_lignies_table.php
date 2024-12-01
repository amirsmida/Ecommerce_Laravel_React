<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commende_lignies', function (Blueprint $table) {
            $table->id();
            $table->integer('id_article')->nullable();
            $table->double('prixU')->nullable();
            $table->integer('quantite')->nullable();
            $table->double('prixT')->nullable();
            $table->integer('id_commende')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commende_lignies');
    }
};
