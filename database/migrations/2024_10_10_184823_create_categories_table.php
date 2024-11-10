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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de la catégorie
            $table->string('description')->nullable(); // Description de la catégorie
            $table->string('image')->nullable(); // Chemin de l'image de la catégorie
            $table->boolean('status')->default(true); // Statut actif ou inactif
            $table->timestamps(); // Created_at et updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
