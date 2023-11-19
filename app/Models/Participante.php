<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    protected $fillable =[
        'documento',
        'tipo_documento',
        'primer_nombre',
        'primer_apellido',
        'segundo_nombre',
        'segundo_apellido',
        'nombre_completo',
        'telefono',
        'direccion',
    ];
}
