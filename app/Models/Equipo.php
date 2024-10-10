<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory; 
    protected $table = 'equipos';  // El nombre de la tabla es correcto
    protected $primaryKey = 'id'; 
    protected $fillable = ['nombre', 'descripcion', 'detalles_tecnicos', 'estado'];
}
