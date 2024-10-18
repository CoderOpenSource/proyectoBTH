<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    // Especificar la tabla asociada al modelo
    protected $table = 'estudiantes';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = ['ci', 'nombre', 'curso_id'];

    // Relación con comportamientos
    public function comportamientos()
    {
        return $this->hasMany(Comportamiento::class, 'estudiante_id');
    }
}

