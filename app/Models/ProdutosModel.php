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

    protected $fillable = [
        'nome',
        'id_categoria',
        'idUser',
        'morada',
        'descricao',
    ];
}
