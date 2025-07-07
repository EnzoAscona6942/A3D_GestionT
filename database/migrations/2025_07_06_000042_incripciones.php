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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default('pendiente');
            $table->string('comentario')->nullable();
            // Claves foráneas 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('taller_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Para evitar inscripciones duplicadas
            $table->unique(['user_id', 'taller_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
