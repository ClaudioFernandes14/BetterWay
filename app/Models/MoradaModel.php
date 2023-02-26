<?php

namespace App\Http\Models;

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
