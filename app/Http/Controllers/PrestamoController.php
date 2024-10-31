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
    // Listar todos los préstamos que están en estado 'prestado'
    $prestamos = Prestamo::select(
        "prestamos.id",  // Seleccionamos el ID del préstamo
        "usuarios.nombre as usuario_nombre",  // El nombre del usuario desde la tabla usuarios
        "equipos.nombre as equipo_nombre",  // El nombre del equipo desde la tabla equipos
        "prestamos.fecha_prestamo",  // Fecha del préstamo
        "prestamos.fecha_devolucion",  // Fecha de devolución
        "prestamos.estado"  // estado
    )
        ->join("usuarios", "usuarios.id", "=", "prestamos.usuario_id")  // Unimos la tabla usuarios
        ->join("equipos", "equipos.id", "=", "prestamos.equipo_id")  // Unimos la tabla equipos
        ->where("prestamos.estado", "prestado")  // Solo préstamos en estado 'prestado'
        ->get();

    // Mostrar vista junto al listado de préstamos
    return view('prestamo.prestamos')->with(['prestamos' => $prestamos]);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create(Cliente $usuarios)
    {
        // Filtrar equipos con estado 'disponible'
        $equipos = Equipo::where('estado', 'disponible')->get();
    
        // Enviar el usuario y los equipos filtrados a la vista
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
    
        // Crear un nuevo préstamo
        $prestamos = new Prestamo;
        $prestamos->usuario_id = $usuarios_id;  // O usar $data['usuario_id'] si viene del formulario
        $prestamos->equipo_id = $data['equipo_id'];
        $prestamos->fecha_prestamo = $data['fecha_prestamo'];
        $prestamos->fecha_devolucion = $data['fecha_devolucion'];
        $prestamos->estado = 'prestado';  // Nuevo campo estado con valor predeterminado 'prestado'
        $prestamos->created_at = now();
        $prestamos->save();
    
        // Después de guardar el préstamo, cambiar el estado del equipo a 'prestado'
        $equipo = Equipo::find($data['equipo_id']);
        $equipo->estado = 'prestado';
        $equipo->save();
    
        // Redirigir a la lista de préstamos con un mensaje de éxito
        return redirect('/prestamo/prestamos')->with('success', 'Préstamo registrado exitosamente y equipo marcado como prestado.');
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
    // Filtrar equipos solo con estado 'disponible'
    $equipos = Equipo::where('estado', 'disponible')->get();

    // Mostrar la vista de edición junto al listado de equipos disponibles
    return view('prestamo.editarprestamo')->with([
        'prestamos' => $prestamos, 
        'equipos' => $equipos
    ]);
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
    
        // Cambiar el estado del equipo previamente asociado al préstamo a "disponible"
        if ($prestamos->equipo_id != $data['equipo_id']) {
            $equipoAnterior = Equipo::find($prestamos->equipo_id);
            if ($equipoAnterior) {
                $equipoAnterior->estado = 'disponible';
                $equipoAnterior->save();
            }
        }
    
        // Reemplazar los datos del préstamo por los nuevos
        $prestamos->equipo_id = $data['equipo_id'];
        $prestamos->fecha_prestamo = $data['fecha_prestamo'];
        $prestamos->fecha_devolucion = $data['fecha_devolucion'];
        $prestamos->updated_at = now();
    
        // Guardar la actualización del préstamo
        $prestamos->save();
    
        // Cambiar el estado del nuevo equipo seleccionado a "prestado"
        $equipoNuevo = Equipo::find($data['equipo_id']);
        if ($equipoNuevo) {
            $equipoNuevo->estado = 'prestado';
            $equipoNuevo->save();
        }
    
        // Redireccionar a la lista de préstamos con un mensaje de éxito
        return redirect('/prestamo/prestamos')->with('success', 'Préstamo actualizado exitosamente y estado de los equipos modificado.');
    }
    



    /**
     * Remove the specified resource from storage.
     */

    public function entrega()
{
    // Listar todos los préstamos que están en estado 'entregado'
    $prestamos = Prestamo::select(
        "prestamos.id",  // Seleccionamos el ID del préstamo
        "usuarios.nombre as usuario_nombre",  // El nombre del usuario desde la tabla usuarios
        "equipos.nombre as equipo_nombre",  // El nombre del equipo desde la tabla equipos
        "prestamos.fecha_prestamo",  // Fecha del préstamo
        "prestamos.fecha_devolucion", // Fecha de devolución
        "prestamos.estado"  // Fecha de devolución
    )
        ->join("usuarios", "usuarios.id", "=", "prestamos.usuario_id")  // Unimos la tabla usuarios
        ->join("equipos", "equipos.id", "=", "prestamos.equipo_id")  // Unimos la tabla equipos
        ->where("prestamos.estado", "entregado")  // Solo préstamos en estado 'entregado'
        ->get();

    // Mostrar vista junto al listado de préstamos entregados
    return view('prestamo.prestamosen')->with(['prestamos' => $prestamos]);
}

public function marcarComoEntregado($id)
{
    // Buscar el préstamo por ID
    $prestamo = Prestamo::find($id);

    // Validar si el préstamo existe
    if (!$prestamo) {
        return redirect()->back()->with('error', 'Préstamo no encontrado');
    }

    // Cambiar el estado del préstamo a 'entregado'
    $prestamo->estado = 'entregado';
    $prestamo->save();

    // Cambiar el estado del equipo a 'disponible'
    $equipo = Equipo::find($prestamo->equipo_id);
    $equipo->estado = 'disponible';
    $equipo->save();

    // Redirigir a la lista de préstamos entregados
    return redirect('/prestamo/prestamosen')->with('success', 'Préstamo marcado como entregado y equipo actualizado a disponible.');
}
public function destroy(string $id)
{
    // Obtener el préstamo antes de eliminarlo
    $prestamo = Prestamo::findOrFail($id);

    // Obtener el equipo asociado al préstamo
    $equipo = Equipo::findOrFail($prestamo->equipo_id);

    // Cambiar el estado del equipo a 'disponible'
    $equipo->estado = 'disponible';
    $equipo->save();

    // Eliminar el préstamo
    $prestamo->delete();

    // Retornar respuesta
    return response()->json(['res' => true]);
}



    public function __construct()
    {
    $this->middleware('auth');
    }
    
}
