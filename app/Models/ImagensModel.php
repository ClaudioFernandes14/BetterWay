<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagensModel extends Model
{
    use HasFactory;
    protected $table = 'imagens';

    public function produto()
    {
        return $this->belongsTo(ProdutosModel::class, 'id_produto');
    }


    protected $fillable = [
        'url',
        'id_produto',
    ];
}
