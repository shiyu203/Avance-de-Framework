<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory; 
    protected $table = 'usuarios';  // El nombre de la tabla es correcto
    protected $primaryKey = 'id'; 
    protected $fillable = ['nombre', 'correo_electronico', 'carnet_dui', 'rol', ' estado'];
}
