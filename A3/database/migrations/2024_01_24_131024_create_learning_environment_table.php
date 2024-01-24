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
        Schema::create('learning_environment', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre');
            $table->string('capacity')->comment('Capacidad');
            $table->string('area_mt2')->comment('Area por metro cuadrado');
            $table->string('floor')->comment('Piso o planta');
            $table->string('inventory')->comment('Inventario');
            $table->foreignId('type_id')->constrained('environment_type')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('FK table type');
            $table->foreignId('location_id')->constrained('location')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('FK table location');
            $table->string('status')->comment('Estado: ACTIVO-INACTIVO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_environment');
    }
};
