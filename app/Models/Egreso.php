<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function participante(){
        return $this->hasOne(Participante::class,'id','id_participante');
    }

    public function conceptos(){
        return $this->hasMany(Concepto::class,'id','id_concepto');
    }
}
