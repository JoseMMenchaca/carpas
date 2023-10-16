<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uso extends Model
{
    use HasFactory;

    protected $fillable = [
        'cosecha_id',
        'fecha',
        'peso_venta',
        'precio_venta',
        'peso_consumo',
        'precio_consumo',
        'precio_total',
    ];

    public function cosecha(){
        return $this->belongsTo(Cosecha::class);
    }
}
