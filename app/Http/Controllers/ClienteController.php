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
        // Listar solo los usuarios autorizados
        $usuarios = Cliente::select(
            "usuarios.id",
            "usuarios.nombre",
            "usuarios.correo_electronico",
            "usuarios.carnet_dui",
            "usuarios.rol",
            "usuarios.estado"
        )
        ->where('estado', 'autorizado') // Filtrar solo los autorizados
        ->get();
    
        // Mostrar vista junto al listado de usuarios
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
        'correo_electronico' => 'required|email',
        'carnet_dui' => 'required',
        'rol' => 'required|in:estudiante,docente'
    ]);

    // Establecer el estado como 'autorizado'
    $data['estado'] = 'autorizado';

    // Crear el nuevo usuario
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

   
    public function bloqueados()
    {
        // Listar solo los usuarios bloqueados
        $usuarios = Cliente::select( // Usando Cliente como modelo
            "usuarios.id",
            "usuarios.nombre",
            "usuarios.correo_electronico",
            "usuarios.carnet_dui",
            "usuarios.rol",
            "usuarios.estado"
        )
        ->where('estado', 'bloqueado') // Filtrar solo los bloqueados
        ->get();
    
        // Mostrar vista junto al listado de usuarios bloqueados
        return view('/usuarios/usuariosbloqueados')->with(['usuarios' => $usuarios]);
    }
    

    public function bloquear($id)
    {
        // Buscar el usuario por ID
        $usuarios = Cliente::find($id); // Manteniendo el modelo como Cliente
    
        // Validar si el usuario existe
        if (!$usuarios) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }
    
        // Cambiar el estado del usuario a 'bloqueado'
        $usuarios->estado = 'bloqueado'; // Asegúrate de usar 'bloqueado'
        $usuarios->save();
    
        // Redirigir a la lista de usuarios bloqueados
        return redirect('/usuarios/usuariosbloqueados')->with('success', 'Usuario bloqueado exitosamente.');
    }
    
    public function quitarBloqueo($id)
{
    // Buscar el usuario por ID
    $usuario = Cliente::find($id); // Manteniendo el modelo como Cliente

    // Validar si el usuario existe
    if (!$usuario) {
        return redirect()->back()->with('error', 'Usuario no encontrado');
    }

    // Cambiar el estado del usuario a 'autorizado'
    $usuario->estado = 'autorizado'; // Asegúrate de usar 'autorizado'
    $usuario->save();

    // Redirigir a la lista de usuarios autorizados
    return redirect('/usuarios/usuarios')->with('success', 'Usuario autorizado exitosamente.');
}



    public function __construct()
    {
    $this->middleware('auth');
    }
}
