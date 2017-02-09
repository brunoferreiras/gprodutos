<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaidaProdutos extends Model
{
	protected $table = 'gp_saida_produtos'; // Determina o nome da tabela no banco

    protected $fillable = [
        'users_id', 'produtos_id','quantidade_saida', 'horas_saida', 'quantidade_dev', 'updated_at', 'created_at',
    ];
}
