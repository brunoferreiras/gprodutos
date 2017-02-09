<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'gp_produtos'; // Determina o nome da tabela no banco
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_rfid', 'cod_barras','produto', 'descricao', 'quantidade', 'users_id', 'updated_at', 'created_at',
    ];

    /**
     * Retorna o nome do produto através do id dele.
     * @param  [int] $id [Id do produto]
     * @return [string]     [Nome do produto]
     */
    public function get_nomeProduto( $id ){

        return Produto::find($id)->produto;
    }
}
