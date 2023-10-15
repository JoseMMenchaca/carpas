<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siembra extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrega_id',
        'fecha_siembra',
        'dimension',
        'variedad_id',
    ];    

    public function entrega(){
        return $this->belongsTo(Entrega::class);
    }

    public function cosecha(){
        return $this->hasOne(Cosecha::class);
    }

    public function variedad(){
        return $this->belongsTo(Variedad::class);
    }

}
