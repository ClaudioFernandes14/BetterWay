<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaModel; 
use App\Models\ProdutosModel; 
use App\Models\ImagensModel;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;


// use App\Http\Controllers\Categoria;
use Illuminate\Support\Facades\DB; // Importe a classe DB


class CriarProdutosController extends Controller
{
    public function mostraCriarProdutos(){
        $categorias = DB::table('categorias')->get(); // Obtenha todas as categorias do banco de dados
        return view('cliente.criarProdutos', ['categorias' => $categorias]);
    }



    /**
     * Vai criar o produto do utilizador ao clicar
     * em confirmar
     */
    public function criarProduto(Request $request){
        // dd($request->all());
        // Validar os dados recebidos
        $validatedData = $request->validate([   
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric|min:0',
            'morada' => 'required',
            'categorias' => 'required',
            'url.*' => 'image|max:2048' // validar imagens enviadas
        ]);


         
         // Criar o produto
        $produto = new ProdutosModel;
        $produto->nome = $validatedData['nome'];
        $produto->descricao = $validatedData['descricao'];
        $produto->preco = $validatedData['preco'];
        $produto->morada = $validatedData['morada'];
        $produto->id_categoria = $validatedData['categorias'];
        $produto->idUser = Auth::user()->id;
        $produto->save();


       // Processar imagens
        if ($request->hasFile('url')) {
            $arquivos = $request->file('url');
            $numImagens = count($arquivos);
            foreach ($arquivos as $arquivo) {
                // Salvar a imagem no servidor
                $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
                $path = public_path('resources/images/produtos/' . $nomeArquivo);
                Image::make($arquivo)->resize(500, 500)->save($path);

                // Cria um novo objeto ImagemModel e define os valores
                $imagemModel = new ImagensModel;
                
                $imagemModel->url = $nomeArquivo;
                $imagemModel->id_produto = $produto->id;

                // Salva a URL da imagem no banco de dados
                $imagemModel->save();
            }
        } else {
            $numImagens = 0;
        }
        
    }
}
