<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Cliente;
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
    public function create(Cliente $usuarios)
    {
        // Obtén todos los equipos disponibles o según tu lógica
        $equipos = Equipo::all();

        // Envía el usuario (en plural) y los equipos a la vista para crear un nuevo préstamo
        return view('prestamo.nuevopresta', compact('usuarios', 'equipos'));
    }




    public function store(Request $request, $usuarios_id)
    {
        // Validación de los datos
        $data = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'equipo_id' => 'required|exists:equipos,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_prestamo',
        ]);
    
        // Crear un nuevo préstamo (ya que este método parece ser para crear, no actualizar)
        $prestamos = new Prestamo;
        $prestamos->usuario_id = $usuarios_id;  // O usar $data['usuario_id'] si viene del formulario
        $prestamos->equipo_id = $data['equipo_id'];
        $prestamos->fecha_prestamo = $data['fecha_prestamo'];
        $prestamos->fecha_devolucion = $data['fecha_devolucion'];  // Corrección del campo 'fecha_devolucion'
        $prestamos->created_at = now();  // O 'updated_at' si se está actualizando
        $prestamos->save();
    
        // Redirigir a la lista de préstamos con un mensaje de éxito
        return redirect('/prestamo/prestamos')->with('success', 'Préstamo registrado exitosamente');
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
    public function edit(Prestamo $prestamos)
    {
        // Listar equipos para llenar el select
        $equipos = Equipo::all();
    
        // Mostrar vista update.blade.php junto al listado de equipos
        return view('prestamo.editarprestamo')->with(['prestamos' => $prestamos, 'equipos' => $equipos]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamos)
{
    // Validar campos
    $data = $request->validate([
        'equipo_id' => 'required|exists:equipos,id',
        'fecha_prestamo' => 'required|date',
        'fecha_devolucion' => 'required|date|after_or_equal:fecha_prestamo'
    ]);

    // Reemplazar datos anteriores por los nuevos
    $prestamos->equipo_id = $data['equipo_id'];
    $prestamos->fecha_prestamo = $data['fecha_prestamo'];
    $prestamos->fecha_devolucion = $data['fecha_devolucion'];
    $prestamos->updated_at = now();

    // Enviar a guardar la actualización
    $prestamos->save();

    // Redireccionar a la lista de préstamos con un mensaje de éxito
    return redirect('/prestamo/prestamos')->with('success', 'Préstamo actualizado exitosamente');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Equipo::destroy($id);

        return response()->json(['res' => true]);
    }
    public function __construct()
    {
    $this->middleware('auth');
    }
}
