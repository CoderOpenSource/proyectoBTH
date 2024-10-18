<?php

namespace App\Imports;

use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;

class EstudiantesImport implements ToModel
{
    protected $curso_id;

    public function __construct($curso_id)
    {
        $this->curso_id = $curso_id;
    }

    public function model(array $row)
    {
        return new Estudiante([
            'ci' => $row[0], // Cédula de identidad (CI)
            'nombre' => $row[1], // Nombre del estudiante
            'curso_id' => $this->curso_id, // Asignar el curso al estudiante
        ]);
    }
}
