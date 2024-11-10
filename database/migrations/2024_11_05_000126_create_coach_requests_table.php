<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coach_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index(); // Ajout d'un index
            $table->string('first_name');
            $table->string('last_name');
            $table->string('specialty');
            $table->string('certification')->nullable(); // Peut être nullable si nécessaire
            $table->text('motivation');
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamps();
            
            // Clé étrangère vers la table users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

public function down()
{
    Schema::dropIfExists('coach_requests');
}

};
