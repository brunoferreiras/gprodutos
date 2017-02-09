<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntradaProdutos extends Model
{
	protected $table = 'gp_entrada_produtos'; // Determina o nome da tabela no banco

    protected $fillable = [
        'users_id', 'produtos_id','quantidade_entrada', 'horas_entrada', 'updated_at', 'created_at',
    ];
}
