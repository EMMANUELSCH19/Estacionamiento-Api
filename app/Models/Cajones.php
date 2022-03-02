<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cajones extends Model
{
    use HasFactory;

    protected $table ='_cajones';
    protected $primaryKey = 'cajon';

    protected $fillable = [
        'cajon',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
