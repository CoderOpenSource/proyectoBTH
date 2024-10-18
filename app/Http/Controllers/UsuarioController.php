<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProfesoresImport;
class UsuarioController extends Controller
{
    public function index()
    {
        // Verificar si el usuario tiene el rol de administrador o profesor
        if (session('rol') !== 'administrador' && session('rol') !== 'profesor') {
            return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
        }
        // Materias comunes
        $materias = ['MATEMÁTICAS', 'CIENCIAS', 'HISTORIA', 'LENGUAJE', 'INGLÉS', 'ARTES'];

        // Obtener solo los usuarios con el rol 'profesor'
        $profesores = Usuario::where('rol', 'profesor')->get();

        return view('admin.profesores.index', compact('profesores', 'materias'));
    }

    public function store(Request $request)
    {
        // Verificar si el usuario tiene el rol de administrador o profesor
        if (session('rol') !== 'administrador' && session('rol') !== 'profesor') {
            return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'contraseña' => 'required|string|min:6',
            'materia' => 'required|string|max:255',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->contraseña),
            'rol' => 'profesor',
            'materia' => $request->materia,
            'fecha_registro' => now(),
        ]);

        return redirect()->route('profesores.index')->with('success', 'Profesor creado exitosamente.');
    }

    public function update(Request $request, Usuario $profesor)
    {
        // Verificar si el usuario tiene el rol de administrador o profesor
        if (session('rol') !== 'administrador' && session('rol') !== 'profesor') {
            return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo,' . $profesor->id,
            'materia' => 'required|string|max:255',
        ]);

        $profesor->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'materia' => $request->materia,
        ]);

        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado exitosamente.');
    }

    public function destroy(Usuario $profesor)
    {
        // Verificar si el usuario tiene el rol de administrador o profesor
        if (session('rol') !== 'administrador' && session('rol') !== 'profesor') {
            return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
        }
        // Eliminar el profesor
        $profesor->delete();
        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado exitosamente.');
    }
    public function import(Request $request)
    {
        // Verificar si el usuario tiene el rol de administrador o profesor
        if (session('rol') !== 'administrador' && session('rol') !== 'profesor') {
            return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
        }

        // Validar que se haya subido un archivo
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        // Importar los datos del archivo Excel
        Excel::import(new ProfesoresImport, $request->file('file'));

        return redirect()->route('profesores.index')->with('success', 'Profesores importados exitosamente.');
    }
}
