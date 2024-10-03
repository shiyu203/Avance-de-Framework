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
   return view('/usuarios/usuarios')->with(['usuarios'=>$usuarios]); 
    } 
    /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   
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
