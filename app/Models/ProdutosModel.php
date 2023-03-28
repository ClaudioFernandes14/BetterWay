<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosModel extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'id_imagem',    
        'id_categoria',
        'morada',
        'descricao',
    ];
}
