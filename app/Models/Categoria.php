<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $table = 'categorias';
    public $timestamps = false;
    protected $fillable =[
        'id',
        'categoria_nombre',
        'categoria_descripcion'
    ];


    protected $hidden = [ 'created_at', 'updated_at' ];
}
