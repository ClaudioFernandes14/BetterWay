<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\UserController;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;
    // use \Illuminate\Auth\Authenticatable; // trait para autenticação

   
    /**
    * Faz Ligacao com a tabela UserType
    */
    public function usertype()
    {
        return $this->hasOne(UserTypeModel::class);
    }


    public function favoritos()
    {
        return $this->belongsToMany(ProdutosModel::class, 'favoritos', 'idUser', 'idProdutos');
    }

    
    // /**
    //  * Faz Ligacao com a tabela Morada
    //  */
    // public function morada()
    // {
    //     return $this->hasOne(MoradaModel::class);
    // }


    


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',    
        'password',
        'morada',
        'cod_postal',
        'telemovel',
        'nif',
        'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function cargo()
    // {
    //     return $this->belongsTo(Cargo::class);
    // }


//     public function generateTwoFactorCode(){
//         $this->timestamps = false;
//         $this->two_factor_code = rand(100000, 999999);
//         $this->two_factor_expires_at = now()->addMinutes(10);
//         $this->save();
        
//     }
// 
}
?>
