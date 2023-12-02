<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EgresoDetalle extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_egreso',
        'id_cuenta',
        'debito',
        'credito'      
    ];

    public function cuentas(){
        return $this->hasMany(Puc::class,'id','id_cuenta');
    }
}
