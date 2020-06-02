<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'user_id', 'category_id', 'nombre', 'precio', 'detalle', 'estado', 'existencia',

    ];
}
