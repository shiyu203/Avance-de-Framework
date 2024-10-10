<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    use HasFactory; 
    protected $table = 'administradores';  // El nombre de la tabla es correcto
    protected $primaryKey = 'id'; 
    protected $fillable = ['nombre', 'correo_electronico'];
}
