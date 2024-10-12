<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    
    protected $table = 'prestamos';  // Nombre de la tabla
    protected $primaryKey = 'id';  // Llave primaria de la tabla
    protected $fillable = ['usuario_id', 'equipo_id', 'fecha_prestamo', 'fecha_devolucion', 'estado'];  // Campos permitidos

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Cliente::class, 'usuario_id');
    }

    // Relación con el modelo Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}

