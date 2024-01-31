<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instructor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document')->unique();
            $table->string('fullname', 50)->comment('Nombre completo');
            $table->string('sena_email', 40)->unique();
            $table->string('personal_email', 50)->unique();
            $table->string('phone', 30)->comment('numero de telefono');
            $table->string('password')->comment('contraseña');
            $table->rememberToken()->comment('recuperación de contraseña');
            $table->string('type')->default('instructor')->comment('tipo');
            $table->string('profile')->default('CONTRATISTA O DE PLANTA')->comment('perfil: CONTRATISTA O DE PLANTA');
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
