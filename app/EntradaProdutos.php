<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntradaProdutos extends Model
{
    protected $fillable = [
        'users_id', 'produtos_id','quantidade_entrada', 'horas_entrada', 'updated_at', 'created_at',
    ];
}
