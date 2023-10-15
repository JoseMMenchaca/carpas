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
        'venta',
        'consumo',
        'precio_venta',
    ];

    public function cosecha(){
        return $this->belongsTo(Cosecha::class);
    }
}
