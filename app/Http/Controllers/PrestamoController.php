<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los préstamos con sus relaciones
        $prestamos = Prestamo::select(
            "prestamos.id",  // Seleccionamos el ID del préstamo
            "usuarios.nombre as usuario_nombre",  // El nombre del usuario desde la tabla usuarios
            "equipos.nombre as equipo_nombre",  // El nombre del equipo desde la tabla equipos
            "prestamos.fecha_prestamo",  // Fecha del préstamo
            "prestamos.fecha_devolucion"  // Fecha de devolución
        )
            ->join("usuarios", "usuarios.id", "=", "prestamos.usuario_id")  // Unimos la tabla usuarios
            ->join("equipos", "equipos.id", "=", "prestamos.equipo_id")  // Unimos la tabla equipos
            ->get();
    
        // Mostrar vista junto al listado de préstamos
        return view('prestamo.prestamos')->with(['prestamos' => $prestamos]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
