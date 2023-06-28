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
    
            $usuariosByMonth = DB::table('users')
                            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                            ->where('created_at', '>=', Carbon::now()->subMonth())
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();
    
            $valoresUsuarios = array_fill(0, 12, 0);
            foreach ($usuariosByMonth as $data) {
                $mes = intval($data->month);
                $valoresUsuarios[$mes - 1] = $data->count;
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
            ]);
    
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

}
