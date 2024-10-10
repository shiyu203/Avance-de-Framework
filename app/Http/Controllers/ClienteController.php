<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Listar todos los productos 
        $usuarios = Cliente::select(
            "usuarios.id",
            "usuarios.nombre",
            "usuarios.correo_electronico",
            "usuarios.carnet_dui",
            "usuarios.rol"
        )
            ->get();
        // dd($productos);
        // Mostrar vista show.blade.php junto al listado de productos 
        return view('/usuarios/usuarios')->with(['usuarios' => $usuarios]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
   
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Branch::all();
        return view('usuarios/nuevousuario')->with(['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'correo_electronico' => 'required|email', // Agregué validación de email
            'carnet_dui' => 'required', // Quité el espacio extra
            'rol' => 'required|in:estudiante,docente' // Validar que el rol sea uno de los valores permitidos
        ]);

        Cliente::create($data);

        return redirect('/usuarios/usuarios');
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
    public function edit(Cliente $usuarios)
{
    return view('usuarios.editarusuario')->with(['usuarios' => $usuarios ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $usuarios)
    {
        // Validar campos
 $data = request()->validate([
    'nombre' => 'required',
    'correo_electronico' => 'required',
    'carnet_dui' => 'required',
    'rol' => 'required',

    ]);
      // Reemplazar los datos anteriores por los nuevos
      $usuarios->nombre = $data['nombre'];
      $usuarios->correo_electronico = $data['correo_electronico'];
      $usuarios->carnet_dui = $data['carnet_dui'];
      $usuarios->rol = $data['rol'];
      $usuarios->updated_at = now(); // Actualizar la fecha
  
      // Guardar los cambios en la base de datos
      $usuarios->save();
  
      // Redireccionar después de actualizar
      return redirect('/usuarios/usuarios');
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cliente::destroy($id);

        return response()->json(['res' => true]);
    }
}
