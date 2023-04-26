<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaModel; 
// use App\Http\Controllers\Categoria;
use Illuminate\Support\Facades\DB; // Importe a classe DB


class CriarProdutosController extends Controller
{
    public function mostraCriarProdutos(){
        $categorias = DB::table('categorias')->get(); // Obtenha todas as categorias do banco de dados
        return view('cliente.criarProdutos', ['categorias' => $categorias]);
    }


 
}
