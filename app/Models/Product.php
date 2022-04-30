<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreProducto',
        'descripcion',
        'precio',
        'fechaCompra',
        'fechaAlta',
        'estado',
        'comentario',
        'categoria_id',
        'sucursal_id'
    ];

    public $timestamps = false;

}
