<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\CargoModel;
use App\Models\ProdutosModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function admin_dashboard(Request $request)
    {
        $user = Auth::user();
        if ($user && $user->idCargo === 1) {
            $month = $request->input('month', Carbon::now()->month); // obtém o mês a partir do parâmetro de consulta ou do mês atual
            $year = $request->input('year', Carbon::now()->year); // obtém o ano a partir do parâmetro de consulta ou do ano atual

            $startDate = Carbon::create($year, $month, 1)->startOfMonth(); // obtém o primeiro dia do mês
            $endDate = Carbon::create($year, $month, 1)->endOfMonth(); // obtém o último dia do mês

            $novosProdutosCount = ProdutosModel::where('created_at', '>=', Carbon::now()->subDays(7))->count();
            $novosProdutosCountPrevious = ProdutosModel::where('created_at', '<', Carbon::now()->subDays(7))->count();
            if ($novosProdutosCountPrevious == 0) {
                $novosProdutosPercentChange = 0; 
            } else {
                $novosProdutosPercentChange = ($novosProdutosCount - $novosProdutosCountPrevious) / $novosProdutosCountPrevious * 100;
            }

            $novosUsuariosCount = DB::table('users')->where('created_at', '>=', Carbon::now()->subDays(7))->count();
            $novosUsuariosCountPrevious = DB::table('users')->where('created_at', '<', Carbon::now()->subDays(7))->count();

            if ($novosUsuariosCountPrevious == 0) {
                $novosUsuariosPercentChange = 0; 
            } else {
                $novosUsuariosPercentChange = ($novosUsuariosCount - $novosUsuariosCountPrevious) / $novosUsuariosCountPrevious * 100;
            }

            $novosProdutos = ProdutosModel::where('created_at', '>=', Carbon::now()->subMonth())->get();

            $usuariosByMonth = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
                        ->whereYear('created_at', Carbon::now()->year)
                        ->groupBy('month')
                        ->get();

            $valoresUsuarios = array_fill(0, 12, 0);
            foreach ($usuariosByMonth as $usuario) {
                $valoresUsuarios[$usuario->month - 1] = $usuario->total;
            }
                    
            $chartDataUsuarios = [];
            foreach ($valoresUsuarios as $i => $valor) {
                $mes = ($i + 1);
                $chartDataUsuarios[] = [
                    'x' => date("F", mktime(0, 0, 0, $mes, 1)),
                    'y' => $valor,
                ];
            }

            return view('admin.admin_dashboard', [
                'user' => $user,
                'novosProdutosCount' => $novosProdutosCount,
                'novosProdutosPercentChange' => $novosProdutosPercentChange,
                'novosProdutosCountPrevious' => $novosProdutosCountPrevious,
                'novosUsuariosCount' => $novosUsuariosCount,
                'novosUsuariosPercentChange' => $novosUsuariosPercentChange,
                'chartData' => $chartDataUsuarios, 
                'novosProdutos' => $novosProdutos, 
                'month' => $month, // passa o mês atual ou o mês selecionado para a visualização
                'year' => $year, // passa o ano atual ou o ano selecionado para a visualização
                'usuariosByMonth' => $usuariosByMonth,
                'valoresUsuarios' => $valoresUsuarios,
            ])->with('precision', 0);

        }

        abort(403, 'Acesso negado.');
    }

    // Lista de utilizadores para o admin
    public function listaUsers(Request $request)
    {
        $user = Auth::user();
        if ($user && $user->idCargo === 1) {
            $users = DB::table('users')->get();
            return view('admin.usersLista', ['user' => $user, 'users' => $users]);
        }
        abort(403, 'Acesso negado.');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->usertype()->delete(); // Remove os registros relacionados na tabela usertype
            $user->delete(); // Remove o usuário
            return redirect()->route('admin_dashboard')->with('success', 'Utilizador removido com sucesso.');
        } else {
            return redirect()->route('admin_dashboard')->with('error', 'Utilizador não encontrado.');
        }
    }



    public function paginaEditar(Request $request, $id)
    {
        $user = User::find($id);
        if ($user && $request->user()->canEditUsers()) {
            $users = DB::table('users')->get();
            return view('admin.editarUsers', ['user' => $user, 'users' => $users]);
        }
        abort(403, 'Acesso negado.');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name ?: $user->name,
            'email' => $request->email ?: $user->email,
            'morada' => $request->morada ?: $user->morada,
            'cod_postal' => $request->cod_postal ?: $user->cod_postal,
            'telemovel' => $request->telemovel ?: $user->telemovel,
            'idCargo' => $request->idCargo ?: $user->idCargo,
        ]);

        // Salva as alteracões feitas do utilizador
        $user->save();
        
        return redirect()->route('users_lista')->with('success', 'Utilizador removido com sucesso.');
       
    }



}
