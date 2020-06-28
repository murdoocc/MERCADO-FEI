<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'alias_emprendedor', 'nombre_propuesta', 'detalle', 'categoria', 'votos'
    ];
}
