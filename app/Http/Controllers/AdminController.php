<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\CargoModel;


class AdminController extends Controller
{
    public function admin_dashboard(Request $request)
    {
        $user = Auth::user();
        // $cargo = CargoModel::where('idCargo', $user->idCargo)->get();
    
         if ($user && $user->idCargo === 1) {
            return view('admin.admin_dashboard', [
                'user' => $user,
                // 'cargo' => $cargo,
            ]);
        }
    
        abort(403, 'Acesso negado.');
    }
}
