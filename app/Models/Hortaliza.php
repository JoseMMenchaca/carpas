<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hortaliza extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
    ];


    public function variedades()
    {
        return $this->hasMany(Variedad::class);
    }
}
