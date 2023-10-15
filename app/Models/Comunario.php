<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ci',
        'lugar',
        'fono',
        'edad',
    ];

    public function entregas(){
        return $this->hasMany(Entrega::class);
    }
}
