<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    protected $fillable = ['titulo', 'curso_id'];

    // Relación con el curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Relación con comportamientos
    public function comportamientos()
    {
        return $this->hasMany(Comportamiento::class, 'acta_id');
    }
}

