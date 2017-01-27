<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaidaProdutos extends Model
{
    protected $fillable = [
        'users_id', 'produtos_id','quantidade_saida', 'horas_saida', 'updated_at', 'created_at',
    ];
}
