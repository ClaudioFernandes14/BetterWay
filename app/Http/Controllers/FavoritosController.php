<?php

namespace App\Http\Controllers;
use App\Models\ProdutosModel;
use App\Models\ImagensModel;
use App\Models\User;
use App\Models\FavoritosModel;
use Auth;

use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    public function mostraFavoritos(){
        // Obtém as informações do usuário com o id presente na URL
        $user = Auth::user();
    
        if (!$user) {
            abort(404, 'Utilizador não encontrado');
        }
       
        // Obtém a lista de IDs dos produtos favoritos do usuário
        $favoritos = FavoritosModel::where('idUser', $user->id)->pluck('idProdutos')->toArray();
       
        // Obtém os produtos favoritos do usuário
        $produtos = ProdutosModel::whereIn('id', $favoritos)->get();
    
        // Obtém as imagens dos produtos favoritos do usuário
        $imagens = ImagensModel::whereIn('id_produto', $produtos->pluck('id'))->get();
    
        return view('cliente.favoritos', [
            'user' => $user,
            'produtos' => $produtos,
            'imagens' => $imagens,
            'favoritos' => $favoritos,
        ]);
    }


    public function removerFavorito(ProdutosModel $produto) {
        $user = Auth::user();
    
        // Verifica se o usuário está autenticado
        if (!$user) {
            abort(404, 'Utilizador não encontrado');
        }
    
        // Remove o produto dos favoritos do usuário
        $favorito = FavoritosModel::where('idUser', $user->id)
                                   ->where('idProdutos', $produto->id)
                                   ->first();
        $favorito->delete();
    
        // Redireciona o usuário para a lista de favoritos
        return redirect('/favoritos');
    }

}
