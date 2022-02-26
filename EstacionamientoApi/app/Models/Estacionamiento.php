<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    use HasFactory;

    protected $table ='_estacionamiento';

    protected $fillable = [
        'numero',
        'entrada',
        'salida',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
