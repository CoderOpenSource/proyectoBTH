<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Especificar la tabla asociada
    protected $table = 'usuarios';

    // Atributos que son asignables en masa
    protected $fillable = [
        'nombre', 'correo', 'contraseña', 'rol', 'fecha_registro', 'materia'
    ];

    // Especificar los atributos ocultos, como la contraseña
    protected $hidden = [
        'contraseña',
    ];

    // Accesor para obtener el campo 'correo' como el atributo 'email'
    public function getEmailAttribute()
    {
        return $this->attributes['correo'];
    }

    // Mutador para definir el campo 'correo'
    public function setEmailAttribute($value)
    {
        $this->attributes['correo'] = $value;
    }

    // Mutador para encriptar la contraseña al establecerla
    public function setPasswordAttribute($value)
    {
        $this->attributes['contraseña'] = bcrypt($value);
    }
}
