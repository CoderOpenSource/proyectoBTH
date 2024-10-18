<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ComportamientoController;
use App\Http\Controllers\ActaController;
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Verificar si el usuario tiene uno de los roles permitidos
    if (!in_array(session('rol'), ['administrador', 'profesor', 'padre'])) {
        return redirect('/login')->withErrors(['No tienes acceso a esta área.']);
    }

    // Si tiene uno de los roles permitidos, mostrar el dashboard
    return view('admin.dashboard');
});


// Grupo de rutas para gestionar profesores
Route::get('/profesores', [UsuarioController::class, 'index'])->name('profesores.index');
Route::post('/profesores', [UsuarioController::class, 'store'])->name('profesores.store');
Route::put('/profesores/{profesor}', [UsuarioController::class, 'update'])->name('profesores.update');
Route::delete('/profesores/{profesor}', [UsuarioController::class, 'destroy'])->name('profesores.destroy');
Route::post('/profesores/import', [UsuarioController::class, 'import'])->name('profesores.import');

// Grupo de rutas para gestionar cursos
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

// Grupo de rutas para gestionar estudiantes
Route::get('/cursos/{curso}/estudiantes', [EstudianteController::class, 'estudiantes'])->name('cursos.estudiantes');
Route::post('/cursos/{curso}/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');
Route::get('/estudiantes/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');

// Rutas para gestionar actas
Route::get('/actas', [ActaController::class, 'index'])->name('actas.index');
Route::get('/actas/create', [ActaController::class, 'create'])->name('actas.create');
Route::post('/actas', [ActaController::class, 'store'])->name('actas.store');
Route::get('/actas/{acta}/edit', [ActaController::class, 'edit'])->name('actas.edit');
Route::put('/actas/{acta}', [ActaController::class, 'update'])->name('actas.update');
Route::delete('/actas/{acta}', [ActaController::class, 'destroy'])->name('actas.destroy');

Route::get('/actas/{acta}/comportamientos', [ComportamientoController::class, 'index'])->name('comportamientos.index');
Route::post('/actas/{acta}/comportamientos', [ComportamientoController::class, 'store'])->name('comportamientos.store');
Route::get('/actas/{acta}/comportamientos/{estudiante_id}/edit', [ComportamientoController::class, 'edit'])->name('comportamientos.edit');
Route::put('/actas/{acta}/comportamientos/{estudiante_id}', [ComportamientoController::class, 'update'])->name('comportamientos.update');
Route::delete('/actas/{acta}/comportamientos/{estudiante_id}', [ComportamientoController::class, 'destroy'])->name('comportamientos.destroy');
