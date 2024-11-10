<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->unsignedBigInteger('user_id'); // Référence à l'utilisateur (coach)
            $table->unsignedBigInteger('category_id')->nullable(); // Référence à la catégorie (NULL autorisé)

            $table->string('title'); // Titre du slot
            $table->text('description')->nullable(); // Description du slot (optionnel)
            
            $table->date('date'); // Date du slot
            $table->time('start_time'); // Heure de début
            $table->time('end_time'); // Heure de fin
            
            $table->integer('capacity'); // Capacité maximale
            $table->string('location')->nullable(); // Lieu du slot (optionnel)
            $table->decimal('price', 8, 2)->default(0); // Prix par participant

            $table->string('image')->nullable(); // Image associée au slot

            $table->enum('status', ['open', 'in_progress', 'completed'])->default('open'); // Statut du slot
            
            $table->timestamps(); // created_at et updated_at
            
            // Clés étrangères
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }
    
    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
}


