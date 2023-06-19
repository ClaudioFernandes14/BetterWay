<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutosModel; 
use App\Models\ImagensModel;
use App\Models\CategoriaModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\User;

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



    public function editarProdutos(Request $request, $id){
       
        $produto = ProdutosModel::find($id);
    
        if (!$produto) {
            abort(404, 'Produto não encontrado');
        }
    
        // Verificar se o usuário logado é o proprietário do produto
        if ($produto->idUser !== auth()->user()->id) {
            return redirect('/produtos/ver/' . $produto->id)->with('error', 'Você não tem permissão para editar este produto.')->with('class', 'error-message');
        }
    
        $user = $produto->user;
        $imagens = ImagensModel::where('id_produto', $id)->get();
        $numImagens = $imagens->count();
        $categoria = null;
        if ($produto->id_categoria) {
            $categoria = CategoriaModel::find($produto->id_categoria);
        }
        // Buscar todas as categorias no banco de dados
        $categorias = CategoriaModel::all();

       
        if (!empty($request->password) && !Hash::check($request->password, $user->password)) { 
            return redirect('/produtos/editar/' . $produto->id)->with('error', 'Senha incorreta.');
        } else{

            // verifica se uma nova senha foi fornecida
            if (!empty($request->password)) {
                // se sim, criptografa a nova senha como hash
                $passwordHash = Hash::make($request->password);
            } else {
                // caso contrário, mantém a senha atual
                $passwordHash = $user->password;
            }

            try {
                $produto->nome = $request->nome ?: $produto->nome;
                $produto->descricao = $request->descricao ?: $produto->descricao;
                $produto->preco = $request->preco ?: $produto->preco;
                $produto->morada = $request->morada ?: $produto->morada;
                $produto->id_categoria = $request->categorias ?: $produto->id_categoria;
            
               // Atualizar as imagens do produto
                 $urls = [];
                foreach ($imagens as $imagem) {
                    $nomeImagem = uniqid() . '.' . $imagem->getClientOriginalExtension();
                    $imagem->move(public_path('resources/images/produtos/'), $nomeImagem);
                    $urls[] = $nomeImagem;
                }

                // Salvar as URLs das imagens no banco de dados
                foreach ($urls as $url) {
                    $imagem = new ImagensModel();
                    $imagem->id_produto = $produto->id;
                    $imagem->url = $url;
                    $imagem->save();
                }
            
                // Atualizar as informações do produto
                $produto->update();
                // return redirect('/produtos/ver/' . $produto->id);

            } catch (\Throwable $th) {
            }
            return view ('cliente.editarProdutos', compact('produto', 'imagens', 'user', 'categoria', 'categorias','numImagens'));
        }
    }


    public function destroy(Request $request, $id)
    {
        $produto = ProdutosModel::find($id);

        $user = $produto->user;
        // Verifica se a senha inserida pelo usuário é a mesma que a senha armazenada no banco de dados
        if (!empty($request->password) && !Hash::check($request->password, $user->password))  {
            return back()->withErrors(['password' => 'Senha incorreta']);
           
        } else {
             // Busca o produto pelo id
             $produto = ProdutosModel::findOrFail($id);
    
             // Busca as imagens associadas ao produto pelo id
              $imagens = ImagensModel::where('id_produto', $id)->get();
  
              // Exclui as imagens do produto do servidor e do banco de dados
              foreach ($imagens as $imagem) {
                  Storage::delete($imagem->url);
                  $imagem->delete();
              }
      
              // Exclui o produto do banco de dados
              $produto->delete();
      
              // Redireciona o usuário para a página de listagem de produtos
              return redirect()->route('index')->with('success', 'Produto excluído com sucesso.');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaModel::class, 'id_categoria');
    }

    public function imagens()
    {
        return $this->hasMany(ImagensModel::class, 'id_produto');
    }
}
