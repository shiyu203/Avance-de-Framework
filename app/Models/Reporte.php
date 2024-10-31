<?php

namespace App\Models;

use App\Models\Administradores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    // Definir la tabla si el nombre no sigue el estándar plural de Laravel
    protected $table = 'reportes';

    // Definir los campos que son asignables en masa
    protected $fillable = [
        'tipo',            // Tipo de reporte (enum)
        'admin_id',        // ID del administrador que generó el reporte (llave foránea)
        'fecha_generacion', // Fecha y hora de generación del reporte
    ];

    // Definir las constantes para el tipo de reporte (opcional)
    const TIPOS_REPORTES = [
        'reporte_usuarios',
        'reporte_usuario_prestamo',
        'reporte_prestamos',
        'reporte_equipos',
        'reporte_administradores',
        'reporte_reportes',
    ];

    /**
     * Relación: Un reporte pertenece a un administrador.
     * Definimos la relación con la tabla `administradores`.
     */
    public function administrador()
    {
        return $this->belongsTo(Administradores::class, 'admin_id');
    }

    /**
     * Atributo de fecha de generación.
     * Este campo puede ser utilizado como timestamp para manejar la fecha y hora del reporte.
     */
    protected $casts = [
        'fecha_generacion' => 'datetime',
    ];
}

