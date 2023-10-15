<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpa extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'lugar',
        'dimension',
        'tipo_techo',
    ];


    public function entregas(){
        return $this->hasMany(Entrega::class);
    }
}
