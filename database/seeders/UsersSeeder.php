<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB; // Ajout de l'import DB
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Exécute le seeder.
     *
     * Cette méthode peuplera la table "users" avec plusieurs types d'utilisateurs.
     */
    public function run(): void
    {

        // Vider la table avant d'insérer de nouvelles données
        DB::table('users')->truncate();      

        // Création d'un administrateur
        DB::table('users')->insert([
            'name' => 'Admin User',
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Utilisation de bcrypt pour hacher le mot de passe
            'role' => 'admin',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Création d'un coach
        DB::table('users')->insert([
            'name' => 'Coach User',
            'username' => 'Coach',
            'email' => 'coach@example.com',
            'password' => bcrypt('password'), // Utilisation de bcrypt pour hacher le mot de passe
            'role' => 'coach',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Création d'un utilisateur classique
        DB::table('users')->insert([
            'name' => 'Lambda User',
            'username' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'), // Utilisation de bcrypt pour hacher le mot de passe
            'role' => 'user',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
