<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;
use App\Models\Reporte;
use App\Models\Cliente;  // Modelo Cliente
use App\Models\Equipo; 
use App\Models\Prestamo; 
use Barryvdh\DomPDF\Facade\PDF;

class ReportController extends Controller
{
    public function mostrarReportes()
{
    // Obtener todos los reportes
    $reportes = Reporte::with('administrador')->get();

    // Devolver la vista con la lista de reportes
    return view('reportes.reportes', compact('reportes'));
}

    /**
     * Mostrar el formulario para seleccionar el administrador.
     */
    public function mostrarFormulario()
    {
        // Obtener todos los administradores
        $administradores = Administradores::all();

        // Devolver la vista con el formulario y la lista de administradores
        return view('usuarios.reporteusuario', compact('administradores'));
    }

    /**
     * Generar y mostrar el PDF del reporte de usuarios.
     */
    public function generarReporte(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'admin_id' => 'required|exists:administradores,id',
        ]);

        // Obtener el administrador seleccionado por su ID
        $admin = Administradores::findOrFail($request->admin_id);

        // Obtener los usuarios autorizados y bloqueados
        $usuariosAutorizados = Cliente::where('estado', 'autorizado')->get();
        $usuariosBloqueados = Cliente::where('estado', 'bloqueado')->get();

        // Obtener la fecha y hora actual para el reporte
        $fechaGeneracion = now();

        // Crear el registro del reporte en la base de datos
        $reporte = Reporte::create([
            'tipo' => 'reporte_usuarios',
            'admin_id' => $admin->id,         // Guardar el ID del administrador
            'fecha_generacion' => $fechaGeneracion,
        ]);

        // Generar el PDF con la información del reporte
        $pdf = PDF::loadView('usuarios.reportePDF', [
            'reporte' => $reporte,
            'admin' => $admin,
            'usuariosAutorizados' => $usuariosAutorizados,
            'usuariosBloqueados' => $usuariosBloqueados,
        ]);

        // Mostrar el PDF en el navegador
        return $pdf->stream('reporte_usuarios.pdf');
    }

    public function mostrarFormularioEquipos()
    {
        // Obtener todos los administradores
        $administradores = Administradores::all();

        // Devolver la vista con el formulario y la lista de administradores
        return view('equipo.reporteEquipos', compact('administradores'));
    }

    /**
     * Generar y mostrar el PDF del reporte de equipos.
     */
    public function generarReporteEquipos(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'admin_id' => 'required|exists:administradores,id',
        ]);

        // Obtener el administrador seleccionado por su ID
        $admin = Administradores::findOrFail($request->admin_id);

        // Obtener los equipos divididos por estado
        $equiposMantenimiento = Equipo::where('estado', 'mantenimiento')->get();
        $equiposPrestados = Equipo::where('estado', 'prestado')->get();
        $equiposDisponibles = Equipo::where('estado', 'disponible')->get();

        // Obtener la fecha y hora actual para el reporte
        $fechaGeneracion = now();

        // Crear el registro del reporte en la base de datos
        $reporte = Reporte::create([
            'tipo' => 'reporte_equipos',
            'admin_id' => $admin->id,
            'fecha_generacion' => $fechaGeneracion,
        ]);

        // Generar el PDF con la información del reporte
        $pdf = PDF::loadView('equipo.reportePDF', [
            'reporte' => $reporte,
            'admin' => $admin,
            'equiposMantenimiento' => $equiposMantenimiento,
            'equiposPrestados' => $equiposPrestados,
            'equiposDisponibles' => $equiposDisponibles,
        ]);

        // Mostrar el PDF en el navegador
        return $pdf->stream('reporte_equipos.pdf');
    }


    public function mostrarFormularioPrestamo()
    {
        $administradores = Administradores::all();
        return view('prestamo.reporteprestamo', compact('administradores'));
    }

    public function generarReportePrestamo(Request $request)
    {
        // Validar el administrador seleccionado
        $request->validate([
            'admin_id' => 'required|exists:administradores,id',
        ]);
    
        // Buscar el administrador
        $admin = Administradores::findOrFail($request->admin_id);
    
        // Obtener los préstamos, incluyendo usuario y equipo
        $prestamos = Prestamo::with(['usuario', 'equipo'])
            ->whereIn('estado', ['prestado', 'entregado'])
            ->orderBy('usuario_id')
            ->get();
    
        // Crear el registro del reporte
        $reporte = Reporte::create([
            'tipo' => 'reporte_prestamos',
            'admin_id' => $admin->id,
            'fecha_generacion' => now(),
        ]);
    
        // Generar el PDF
        $pdf = PDF::loadView('prestamo.reportePDF', [
            'reporte' => $reporte,
            'admin' => $admin,
            'prestamos' => $prestamos,
        ]);
    
        return $pdf->stream('reporte_prestamos.pdf');
    }
    public function __construct()
    {
    $this->middleware('auth');
    }
}
    
    

