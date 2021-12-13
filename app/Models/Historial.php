<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_y_hora',
'valor',
'tipo',
'sensor_id',
    ];
     public function usuarios()
    {
        return $this->belongsToMany(Sensor::class,'id');
    }
    public $timestamps = false;
}
