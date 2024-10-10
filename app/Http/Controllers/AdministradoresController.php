<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;
class AdministradoresController extends Controller
{
    public function index()
    {

        // Listar todos los productos 
        $administradores = Administradores::select(
            "administradores.id",
            "administradores.nombre",
            "administradores.correo_electronico"
   
        )
            ->get();
        // dd($productos);
        // Mostrar vista show.blade.php junto al listado de productos 
        return view('/administrador/admins')->with(['administradores' => $administradores]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
   
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $administradores = Administradores::all();
        return view('administrador/nuevoadmin')->with(['administradores ' => $administradores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'correo_electronico' => 'required|email', // Validación de email
        ]);
    
        // Crear el nuevo administrador
        Administradores::create($data);
    
        // Redirigir a la lista de administradores con un mensaje de éxito
        return redirect('/administrador/admins')->with('success', 'Administrador creado con éxito.');
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
    public function edit(Administradores $administradores)
{
    return view('administrador.editaradmin')->with(['administradores' => $administradores ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administradores $administradores)
    {
        // Validar campos
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255', // Asegúrate de que sea un email válido
        ]);
    
        // Actualizar los datos del administrador
        $administradores->update([
            'nombre' => $data['nombre'],
            'correo_electronico' => $data['correo_electronico'],
        ]);
    
        // Redireccionar con un mensaje de éxito
        return redirect('/administrador/admins')->with('success', 'Administrador actualizado correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Administradores::destroy($id);

        return response()->json(['res' => true]);
    }
}
