<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario; // Modelo Usuario
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Retorna la vista del formulario de login
    }

    public function login(Request $request)
    {
        // Validar los datos de la solicitud
        $credentials = $request->validate([
            'correo' => ['required', 'email'],  // Validación del campo correo
            'password' => ['required'],
        ]);

        // Verificar si el correo y la contraseña coinciden con un usuario registrado
        $usuario = Usuario::where('correo', $request->correo)->first();

        // Verificar las credenciales y el rol
        if ($usuario && Hash::check($request->password, $usuario->contraseña)) {
            // Guardar en la sesión tanto el ID del usuario como su rol
            $request->session()->put('usuario_id', $usuario->id);
            $request->session()->put('rol', $usuario->rol); // Guardar el rol del usuario en la sesión
            $request->session()->put('nombre', $usuario->nombre); // Guardar el nombre del usuario en la sesión

            // Redirigir al dashboard dependiendo del rol
            if ($usuario->rol === 'administrador') {
                return redirect('/dashboard');
            } elseif ($usuario->rol === 'profesor') {
                return redirect('/dashboard');
            } elseif ($usuario->rol === 'padre') {
                return redirect('/dashboard');
            }
        }

        // Si falló, redirigir de vuelta al login con un mensaje de error
        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('correo');
    }

    public function logout(Request $request)
    {
        // Cerrar la sesión
        $request->session()->flush(); // Limpiar toda la sesión (ID y rol)
        return redirect('/'); // Redirigir a la página principal o login
    }
}
