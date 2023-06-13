<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutosModel; 
use App\Models\ImagensModel;
use App\Models\CategoriaModel;

class ProdutosController extends Controller
{
    public function mostraProdutos($id)
    {
        $produto = ProdutosModel::find($id);
    
        if (!$produto) {
            abort(404, 'Produto não encontrado');
        }
    
        $user = $produto->user;
        $imagens = ImagensModel::where('id_produto', $id)->get();
        $categoria = null;
        if ($produto->id_categoria) {
            $categoria = CategoriaModel::find($produto->id_categoria);
        }

    
        return view('verProdutos', compact('produto', 'imagens', 'user', 'categoria'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaModel::class, 'id_categoria');
    }
}
