<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class UserTypeModel extends Model
{
    protected $table = 'usertype';
    public $timestamps = false;
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $fillable = [
        'user_id',
        'idProdutos',
        'idFavoritos',    
        'idClassificacao',
    ];



}
?>