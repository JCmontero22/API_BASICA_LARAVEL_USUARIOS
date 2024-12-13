<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    use HasFactory;
    protected $table = 'usuarios_api_laravel';
    public $timestamps = false;
    protected $primaryKey = "id_usuario";
    protected $fillable = [
        'id_usuario',
        'nombre_usuario',
        'apellido_usuario',
        'identificacion_usuario',
        'telefono_usuario',
        'email_usuario',
        'estado_usuario'
    ];
}
