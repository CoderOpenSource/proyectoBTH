<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    // Definir la tabla, ya que no estamos utilizando el nombre por defecto (plural)
    protected $table = 'comportamientos';

    // Deshabilitar la auto-incrementación de la clave primaria
    public $incrementing = false;

    // Laravel no soporta claves primarias compuestas directamente, por lo que no podemos usar el primaryKey como array
    protected $primaryKey = null;

    // Permitir las asignaciones masivas para estos campos
    protected $fillable = ['descripcion', 'fecha', 'tipo', 'acta_id', 'estudiante_id', 'profesor'];

    // Relación con el modelo Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }

    // Relación con el modelo Acta
    public function acta()
    {
        return $this->belongsTo(Acta::class, 'acta_id');
    }
}

