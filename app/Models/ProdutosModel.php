<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosModel extends Model
{
    use HasFactory;
    protected $table = 'produtos';
   


    public function categorias()
    {
        return $this->hasOne(CategoriaModel::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaModel::class, 'id_categoria');
    }

    public function imagens()
    {
        return $this->hasOne(ImagensModel::class);
    }

    public function usertype(){
        return $this->hasOne(UserTypeModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }


    public function favoritos()
    {
        return $this->belongsToMany(ProdutosModel::class, 'favoritos', 'idUser', 'idProdutos');
    }

    protected $fillable = [
        'nome',
        'preco',
        'id_categoria',
        'idUser',
        'morada',
        'descricao',
    ];
}
