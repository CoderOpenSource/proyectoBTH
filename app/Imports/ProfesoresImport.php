<?php

namespace App\Imports;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProfesoresImport implements ToModel
{
    /**
     * Definir el modelo para cada fila del Excel.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Generar el correo eliminando espacios, convirtiendo a minúsculas y añadiendo el dominio
        $nombre = strtolower(str_replace(' ', '', $row[0]));
        $correo = $nombre . '@juancitopinto.com'; // Cambia el dominio como solicitado

        // Eliminar espacios del nombre antes de invertirlo para generar la contraseña
        $nombreSinEspacios = str_replace(' ', '', $row[0]);
        $contraseña = strrev($nombreSinEspacios); // Invertir el nombre sin espacios

        return new Usuario([
            'nombre' => $row[0], // La primera columna: Nombre del profesor
            'correo' => $correo, // Correo generado basado en el nombre
            'contraseña' => Hash::make($contraseña), // Contraseña generada (nombre al revés sin espacios) y hasheada
            'materia' => strtoupper($row[1]), // La segunda columna: Materia (convertida a mayúsculas)
            'rol' => 'profesor', // Rol asignado
            'fecha_registro' => now(), // Fecha de registro actual
        ]);
    }

}

