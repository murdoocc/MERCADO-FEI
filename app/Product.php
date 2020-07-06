<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'user_id', 'category_id', 'alias_emprendedor', 'nombre', 'precio', 'detalle', 'estado', 'existencia', 'product_image',

    ];

    public function user(){
        return $this->belongsTo(User::class);
        // 2) Cada Producto creado pertenece A UNO y SOLO un USUARIO
    }
}
