<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'tipoManzana',
        'precioKilo'
    ];
}
