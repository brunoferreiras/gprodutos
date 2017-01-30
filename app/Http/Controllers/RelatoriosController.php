<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntradaProdutos;
use App\SaidaProdutos;
use App\Produto;
use App\User;
use Illuminate\Support\Facades\Auth;

class RelatoriosController extends Controller
{
    private $entradaProduto;
    private $saidaProduto;
    private $produto;
    private $usuario;

    public function __construct(EntradaProdutos $entradaProduto, SaidaProdutos $saidaProduto, User $user, Produto $produto){
    	$this->entradaProduto = $entradaProduto;
    	$this->saidaProduto = $saidaProduto;
        $this->produto = $produto;
        $this->usuario = $user;
    	$this->middleware('auth');
    }

    public function index(){

    	$titulo = "Relatório de Entrada e Saídas | Sistema de Gerenciamento de Produtos";
    	$emprestimos = $this->saidaProduto->all();
        // Coloca na variável os respectivos nomes ao invés do id
        foreach($emprestimos as $valor){
            $valor->users_id = $this->usuario->get_nomeUsuario($valor->users_id);
            $valor->produtos_id = $this->produto->get_nomeProduto($valor->produtos_id);
        }

    	$devolucoes = $this->entradaProduto->all();
        // Coloca na variável os respectivos nomes ao invés do id
        foreach($devolucoes as $valor){
            $valor->users_id = $this->usuario->get_nomeUsuario($valor->users_id);
            $valor->produtos_id = $this->produto->get_nomeProduto($valor->produtos_id);
        }

    	return view('relatorios.entradas_saidas', compact('titulo', 'emprestimos', 'devolucoes'));
    }
}
