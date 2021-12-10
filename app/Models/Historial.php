<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
'fecha_final',
'hora_inicio',
'hora_final',
'estado',
'descripcion',
'sensor_id',
    ];
     public function usuarios()
    {
        return $this->belongsToMany(Sensor::class,'id');
    }
    public $timestamps = false;
}
