<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    // Definir la tabla, ya que no estamos utilizando el nombre por defecto (plural)
    protected $table = 'comportamientos';

    // No necesitamos deshabilitar la auto-incrementación, ya que tenemos la columna 'id'
    public $incrementing = true;

    // No es necesario manejar claves compuestas, ahora 'id' es la clave primaria
    protected $primaryKey = 'id';

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
