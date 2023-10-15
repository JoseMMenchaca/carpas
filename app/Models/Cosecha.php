<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{
    use HasFactory;

    protected $fillable = [
        'siembra_id',
        'peso_cosecha',
        'unidad_medida',
        'fecha_cosecha',
        'estado',
    ];

    public function siembra(){
        return $this->belongsTo(Siembra::class);
    }

    public function usos(){
        return $this->hasOne(Uso::class);
    }
}
