<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoModel extends Model
{
    use HasFactory;

    protected $table = 'cargo';
    public $timestamps = false;


    protected $fillable = [
        'cargos',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
