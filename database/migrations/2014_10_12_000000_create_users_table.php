<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     *
     * Cette méthode est responsable de créer la table "users" dans la base de données.
     */
    public function up(): void
    {
        // Création de la table 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('name', 100); // Nom de l'utilisateur
            $table->string('username', 100); // Surnom de l'utilisateur

            $table->string('email', 150)->unique(); // Email unique de l'utilisateur
            $table->timestamp('email_verified_at')->nullable(); // Date de vérification de l'email
            $table->string('password'); // Mot de passe haché


            $table->enum('role', ['admin', 'coach', 'user'])->default('user'); // Rôle de l'utilisateur
            $table->enum('status', ['active', 'inactive'])->default('active'); // Statut du compte

            
            $table->rememberToken(); // Token pour "Se souvenir de moi"
            $table->timestamps(); // Horodatage des enregistrements
        });
    }

    /**
     * Annule les migrations.
     *
     * Cette méthode supprime la table "users" si elle existe.
     */
    public function down(): void
    {
        // Suppression de la table 'users'
        Schema::dropIfExists('users');
    }
};
