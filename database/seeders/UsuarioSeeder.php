<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Admin',
            'correo' => 'admin123@juancitopinto.com',
            'contraseña' => bcrypt('123456'), // Laravel automáticamente cifra la contraseña
            'rol' => 'administrador',
            'fecha_registro' => Carbon::now(), // Fecha actual
        ]);
        // Crear un usuario padre
        Usuario::create([
            'nombre' => 'Padre',
            'correo' => 'padre123@juancitopinto.com',
            'contraseña' => bcrypt('123456'), // Mismo método de cifrado para la contraseña
            'rol' => 'padre',
            'fecha_registro' => Carbon::now(), // Fecha actual
        ]);
    }
}
