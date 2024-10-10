<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Equipo;


class EquipoController extends Controller
{
    public function index()
    {

        // Listar todos los productos 
        $equipos = Equipo::select(
            "equipos.id",
            "equipos.nombre",
            "equipos.descripcion",
            "equipos.detalles_tecnicos",
            "equipos.estado"
        )
            ->get();
        // dd($productos);
        // Mostrar vista show.blade.php junto al listado de productos 
        return view('/equipo/equipos')->with(['equipos' => $equipos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
   
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('equipo/nuevoequipo')->with(['equipos' => $equipos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required', // Agregué validación de email
            'detalles_tecnicos' => 'required', // Quité el espacio extra
            'estado' => 'required|in:mantenimiento,prestado,disponible' // Validar que el rol sea uno de los valores permitidos
        ]);

        Equipo::create($data);

        return redirect('/equipo/equipos');
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
    public function edit(Equipo $equipos)
{
    return view('equipo.editarequipo')->with(['equipos' => $equipos ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipos)
    {
        // Validar campos
 $data = request()->validate([
    'nombre' => 'required',
    'descripcion' => 'required',
    'detalles_tecnicos' => 'required',
    'estado' => 'required',

    ]);
      // Reemplazar los datos anteriores por los nuevos
      $equipos->nombre = $data['nombre'];
      $equipos->descripcion = $data['descripcion'];
      $equipos->detalles_tecnicos = $data['detalles_tecnicos'];
      $equipos->estado = $data['estado'];
      $equipos->updated_at = now(); // Actualizar la fecha
  
      // Guardar los cambios en la base de datos
      $equipos->save();
  
      // Redireccionar después de actualizar
      return redirect('/equipo/equipos');
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Equipo::destroy($id);

        return response()->json(['res' => true]);
    }
}
