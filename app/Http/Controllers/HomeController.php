<?php

namespace App\Http\Controllers;
// namespace App\Models;

// use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Auth\Notifications\VerifyEmail;  
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserTypeModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountDeleted;
use Illuminate\Support\Str;



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
        if (!request()->hasCookie('cookie_consent')) {
            return response(view('index'))->withCookie(cookie('cookie_consent', Str::uuid(), 365));
        }
        return view('index');
    }

    public function getCookie() {
       return request()->cookie('cookie_consent');
    }

    public function deleteCookie(){
        
        return response('deleted')->withCookie(cookie('cookie_consent', null, -1));
    }

    /**
     * Vai para a pagina do perfil
     */
    public function perfil(){
        $user = Auth::user();
        // $userType = $user->usertype;    // vai buscar o id do user no usertype
        // $idMorada = $userType->idMorada;    // vai buscar o id da morda na tabela do user
        // 'morada' => MoradaModel::find($idMorada)
        return view('perfil', array('user' => $user));
    }

    /**
     * Faz upload na foto que o utilizador quer
     */
    public function updateAvatar(Request $request){
        
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(500, 500)->save(public_path('resources/images/user-img/' . $filename));

            $user = auth()->user();
            $user->avatar = $filename;
            $user->save();

            return redirect('/perfil')->with('success', 'O avatar foi carregado com sucesso!');
            
        }

        return view('/perfil', array('user' => Auth::user()));
    }


    // public function usertype()
    // {
    //     return $this->hasOne(UserTypeModel::class);
    // }


    /**
     * Vai atualizar o perfil do utilizador
     */
    public function updateProfile(UpdateProfileRequest $request){
        $user = auth()->user();
        // dd($request->all());
        // $passwordHash = Hash::make($request->password);


        if (!empty($request->password) && !Hash::check($request->password, $user->password)) {
            return redirect('/perfil')->with('error', 'Senha incorreta.');
        }else {
            // verifica se uma nova senha foi fornecida
            if (!empty($request->password)) {
                // se sim, criptografa a nova senha como hash
                $passwordHash = Hash::make($request->password);
            } else {
                // caso contrário, mantém a senha atual
                $passwordHash = $user->password;
            }

            try {

                // Atualiza os dados do utilizador
                $user->update([
                    'name' => $request->name ?: $user->name,
                    'email' => $request->email ?: $user->email,
                    'password' => $passwordHash ?: $user->password,
                    'morada' => $request->morada ?: $user->morada,
                    'cod_postal' => $request->cod_postal ?: $user->cod_postal,
                    'telemovel' => $request->telemovel ?: $user->telemovel,
                    'nif' => $request->nif ?: $user->nif,
                ]);


                // Salva as alteracões feitas do utilizador
                $user->save();
                

                return redirect('/perfil');
        
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }

        
    }


    // Vai eliminar a conta do utilizador
    public function deleteProfile(Request $request, $id){
        $user = User::find($id);
    
        // Verifica se a senha inserida pelo usuário é a mesma que a senha armazenada no banco de dados
        if (Hash::check($request->password, $user->password)) {
            
            // Exclui o registro da tabela 'user_type' relacionado ao usuário
            \App\Models\UserTypeModel::where('user_id', $id)->delete();
    
            // Exclui o registro da tabela 'users'
            $user->delete();
    
            // // Enviar e-mail de agradecimento
            // Mail::to(Auth::user()->email)->send(new AccountDeleted());
            return redirect()->route('login')->with('success', 'Conta eliminada com sucesso');
        } else {
            return back()->withErrors(['password' => 'Senha incorreta']);
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
