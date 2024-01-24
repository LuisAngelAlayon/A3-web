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
        Schema::create('instructor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document')->unique(); 
            $table->string('fullname', 50)->comment('Nombre completo');
            $table->string('sena_email', 40)->unique();
            $table->string('personal_email', 50)->unique();
            $table->integer('phone')->comment('numero de telefono');
            $table->string('password', 30)->unique()->comment('contraseña');
            $table->rememberToken()->comment('recuperación de contraseña');
            $table->string('type')->comment('tipo');
            $table->string('profile')->comment('perfil: CONTRATISTA DE PLANTA');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor');
    }
};
