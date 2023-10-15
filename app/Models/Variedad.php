<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'variedad_hortalizas';


    protected $fillable = [
        'hortaliza_id',
        'codigo',
        'variedad',
    ];
}
