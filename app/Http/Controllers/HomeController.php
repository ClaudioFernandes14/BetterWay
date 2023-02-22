<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Auth\Notifications\VerifyEmail;  

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Vai para a pagina do perfil
     */
    public function perfil(){
        return view('perfil', array('user' => Auth::user()));
    }



    /**
     * Faz upload na foto que o utilizador quer
     */
    public function updateAvatar(Request $request){
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/resources/images/' . $filename));

            $user = auth()->user();
            $user->avatar = $filename;
            $user->save();
            
        }

        return view('/perfil', array('user' => Auth::user()));
    }


    // /**
    //  * Valida se o email do utilizador ja foi verificado
    //  * Reenvia a notificacao do email
    //  */
    // public function resendEmailVerification()
    // {
    //     if (Auth::user()->hasVerifiedEmail()) {
    //         return redirect('/welcome')->with('success', 'Seu e-mail já foi verificado!');
    //     }

    //     Auth::user()->sendEmailVerificationNotification();

    //     return redirect()->back()->with('success', 'Um novo e-mail de verificação foi enviado para o seu endereço de e-mail!');
    // }
    
}
