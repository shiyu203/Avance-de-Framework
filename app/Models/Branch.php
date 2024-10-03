<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory; protected $table='usuarios';  
 protected $primaryKey = 'codigo'; 
 protected $fillable = [
    'nombre',
    'correo_electronico',
    'carnet_dui',
    'rol'
];
}
