<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritosModel extends Model
{
    use HasFactory;

    protected $table = 'favoritos';
    public $timestamps = false;


    protected $fillable = [
        'id',
        'idUser',
        'idProdutos',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }


    public function produto()
    {
        return $this->belongsTo(ProdutosModel::class, 'idProdutos');
    }


}
