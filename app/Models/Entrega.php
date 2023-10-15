<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $table = 'entrega_carpas';


    protected $fillable = [
        'carpa_id',
        'comunario_id',
        'fecha_entrega',
    ];

    public function carpa(){
        return $this->belongsTo(Carpa::class);
    }

    public function comunario(){
        return $this->belongsTo(Comunario::class);
    }

    public function siembras(){
        return $this->hasMany(Siembra::class);
    }
}
