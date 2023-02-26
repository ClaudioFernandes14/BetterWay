<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Auth\Notifications\VerifyEmail;  
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;

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
     * Faz Ligacao com a tabela UserType
     */
    public function usertype()
    {
        return $this->hasOne(UserTypeModel::class);
    }


    /**
     * Faz Ligacao com a tabela Morada
     */
    public function morada()
    {
        return $this->hasOne(MoradaModel::class);
    }



    /**
     * Faz upload na foto que o utilizador quer
     */
    public function updateAvatar(Request $request){
        
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('resources/images/' . $filename));

            $user = auth()->user();
            $user->avatar = $filename;
            $user->save();
            
        }

        return view('/perfil', array('user' => Auth::user()));
    }


    /**
     * Vai atualizar o perfil do utilizador
     */
    public function updateProfile(UpdateProfileRequest $request){
        try {
            $user = auth()->user();
            $passwordHash = Hash::make($request->password);
    
            // atualiza os dados do usuário na tabela "users"
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordHash,
                
            ]);
    
            // busca o usuário atualizado
            // $user = User::findOrFail($user->id);
    
            // // atualiza ou cria o registro na tabela "usertype"
            // $userType = $user->userType ?? new UserTypeModel;
            // $userType->idUser = $user->id;
            // $userType->telemovel = $request->telemovel;
            // $userType->nif = $request->nif;
            // $userType->save();
    
            // // atualiza ou cria o registro na tabela "morada"
            // $morada = $user->morada ?? new MoradaModel;
            // $morada->morada = $request->morada;
            // $morada->cod_postal = $request->cod_postal;
            // $morada->save();
    
            session()->flash('success', 'O seu perfil foi atualizado com sucesso');
    
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao atualizar o seu perfil. Por favor, tente novamente.');
    
            return redirect()->back()->withInput();
        }

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
