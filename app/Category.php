<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categoria', 'sub_uno', 'sub_dos',
    ];
}
