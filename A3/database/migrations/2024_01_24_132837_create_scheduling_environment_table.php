<?php

use App\Models\Instructor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scheduling_environment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('course')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('FK table course');
            $table->foreignId('instructor_document')->constrained('instructor', 'document')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('date_scheduling')->comment('fecha de entorno');
            $table->time('initial_hour')->comment('Hora inicial');
            $table->time('final_hour')->comment('Hora final');
            $table->foreignId('environment_id')->constrained('learning_environment')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->comment('FK table environment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduling_environment');
    }
};
