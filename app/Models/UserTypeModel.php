<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypeModel extends Model
{
    use HasFactory;


    protected $fillable = [
        'idUser',
        'nome',    
        'idMorada',
        'telemovel',
        'nif',    
        'idProdutos',
        'idFavoritos',    
        'idClassificacao',
    ];



}
