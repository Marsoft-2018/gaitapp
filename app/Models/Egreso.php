<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;
    protected $fillable =[
       'consecutivo',
        'id_participante',
        'fecha',
        'valor',
        'id_concepto',
        'elaborado',
        'aprobado',
        'contabilizado'        
    ];
}
