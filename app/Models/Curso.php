<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Curso extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
    ];


}
