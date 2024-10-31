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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();  // ID del reporte
            $table->enum('tipo', [
                'reporte_usuarios', 
                'reporte_usuario_prestamo', 
                'reporte_prestamos', 
                'reporte_equipos', 
                'reporte_administradores', 
                'reporte_reportes'
            ]);  // Tipo de reporte como enum
            $table->foreignId('admin_id')->constrained('administradores');  // Llave foránea hacia la tabla administradores
            $table->timestamp('fecha_generacion')->useCurrent();  // Fecha y hora en la que se generó el reporte
            $table->timestamps();  // Timestamps (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};