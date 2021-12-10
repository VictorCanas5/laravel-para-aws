<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'user_id',
    ];
    public function usuarios()
    {
        return $this->belongsToMany(User::class,'id');
    }
    public function sensor()
    {
        return $this->belongsTo(Historial::class,'id');
    }
}
