<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosModel extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    public $timestamps = false;


    public function categorias()
    {
        return $this->hasOne(CategoriaModel::class);
    }


    public function imagens()
    {
        return $this->hasOne(ImagensModel::class);
    }


    protected $fillable = [
        'nome',
        'id_categoria',
        'idUser',
        'morada',
        'descricao',
    ];
}
