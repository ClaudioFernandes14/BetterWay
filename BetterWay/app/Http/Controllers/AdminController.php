<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        $user = Auth::user();   
        return view('admin.admin_dashboard', array('user' => $user));
    }
}
