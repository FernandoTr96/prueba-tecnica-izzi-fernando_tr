<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'sucursal'
    ];

    public $timestamps = false;

    // relaciones
    public function products()
    {
         return $this->belongsToMany('App\Models\Product');
    }
}
