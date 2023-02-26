<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoradaModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'morada',
        'cod_postal',
    ];

}
