<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricula', 'usuario','nome', 'email', 'password','nivel_acesso','remember_token', 'updated_at', 'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retorna o nome do usuário através do id dele.
     * @param  [int] $id [Id do usuário]
     * @return [string]     [Nome do usuário]
     */
    public function get_nomeUsuario( $id ){

        return User::find($id)->nome;
    }
}
