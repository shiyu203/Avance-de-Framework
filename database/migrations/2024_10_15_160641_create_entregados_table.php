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
        Schema::create('entregados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // Sin constraint de clave foránea
            $table->unsignedBigInteger('equipo_id');  // Sin constraint de clave foránea
            $table->timestamp('fecha_prestamo');
            $table->timestamp('fecha_devolucion')->nullable();
            $table->enum('estado', ['prestado', 'entregado']);
            $table->timestamps();
            
            // Indexes opcionales (si deseas)
            $table->index('usuario_id');
            $table->index('equipo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregados');
    }
};

