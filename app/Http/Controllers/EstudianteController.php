<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Método para ver los estudiantes de un curso específico
    public function estudiantes(Curso $curso)
    {
        // Verificar si el usuario tiene el rol de administrador o profesor
        if (session('rol') !== 'administrador' && session('rol') !== 'profesor') {
            return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
        }

        // Obtener los estudiantes del curso
        $estudiantes = Estudiante::where('curso_id', $curso->id)->get();

        // Enviar la lista de estudiantes a la vista
        return view('admin.cursos.estudiantes', compact('curso', 'estudiantes'));
    }

    // Método para guardar un nuevo estudiante
    public function store(Request $request, Curso $curso)
    {
        // Verificar si el usuario tiene el rol de administrador o profesor
        if (session('rol') !== 'administrador' && session('rol') !== 'profesor') {
            return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
        }        $request->validate([
            'nombre' => 'required|string|max:255',
            'ci' => 'required|integer|unique:estudiantes',
        ]);

        Estudiante::create([
            'nombre' => $request->nombre,
            'ci' => $request->ci,
            'curso_id' => $curso->id,
        ]);

        return redirect()->route('cursos.estudiantes', $curso->id)->with('success', 'Estudiante creado exitosamente.');
    }
    // Método para mostrar el formulario de edición de un estudiante
    public function edit(Estudiante $estudiante)
    {
        return view('admin.estudiantes.edit', compact('estudiante'));
    }

    // Método para actualizar un estudiante
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ci' => 'required|integer|unique:estudiantes,ci,' . $estudiante->id,
        ]);

        $estudiante->update($request->only('nombre', 'ci'));

        return redirect()->route('cursos.estudiantes', $estudiante->curso_id)->with('success', 'Estudiante actualizado exitosamente.');
    }

    // Método para eliminar un estudiante
    public function destroy(Estudiante $estudiante)
    {
        $curso_id = $estudiante->curso_id;
        $estudiante->delete();

        return redirect()->route('cursos.estudiantes', $curso_id)->with('success', 'Estudiante eliminado exitosamente.');
    }
}
