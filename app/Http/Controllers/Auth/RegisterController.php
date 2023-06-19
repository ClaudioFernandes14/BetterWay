<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\MoradaModel;
use App\Models\UserTypeModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
  
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::VERIFICAR_CONTA;

    protected $redirectTos = RouteServiceProvider::HOME;

    public function verifica_redirect(){
        
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect($redirectTos)->with('success', 'Seu e-mail já foi verificado!');
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'date_of_birth' => ['required', 'date', 'adult'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     * 
     */
    protected function create(array $data)
    {
        $cargo = 2;

        // Cria a conta do user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'idCargo' => $cargo,
            'date_of_birth' => $data['date_of_birth'],
        ]);


   

        $usertype = UserTypeModel::updateOrCreate(
            ['user_id' => $user->id],
            [
                // 'idMorada' => $morada->id,
                // 'telemovel' => 1,
                // 'nif' => 1,    
                'idFavoritos' => null,    
                'idClassificacao' => null,
            ]


        );

             // $morada = MoradaModel::create([
            //     'morada' => 'Sem morada definida',
            //     'cod_postal' => 1,
            // ]);


            // Loga o usuário
            auth()->login($user);

            // Retorna o usuário criado
            return $user;

        //    // Cria o user
        //     $user = User::create([
        //         'name' => $data['name'],
        //         'email' => $data['email'],
        //         'password' => Hash::make($data['password']),
        //     ]);

        //     // Cria o cargo do utilizador
        //     $cargo = Cargo::create([
        //         'cargos' => 'cliente',
        //     ]);

        //     // Associa o cargo ao usuário criado
        //     $user->cargo()->associate($cargo);
        //     $user->save();

        //     return $user;
    }
}
