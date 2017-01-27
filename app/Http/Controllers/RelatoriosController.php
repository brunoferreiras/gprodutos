<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntradaProdutos;
use App\SaidaProdutos;
use App\Produto;
use Illuminate\Support\Facades\Auth;

class RelatoriosController extends Controller
{
    private $entradaProduto;
    private $saidaProduto;

    public function __construct(EntradaProdutos $entradaProduto, SaidaProdutos $saidaProduto){
    	$this->entradaProduto = $entradaProduto;
    	$this->saidaProduto = $saidaProduto;
    	$this->middleware('auth');
    }

    public function index(){

    	$titulo = "Relatório de Entrada e Saídas | Sistema de Gerenciamento de Produtos";
    	$emprestimos = $this->saidaProduto->all();
    	$devolucoes = $this->entradaProduto->all();

    	return view('relatorios.entradas_saidas', compact('titulo', 'emprestimos', 'devolucoes'));
    }
}
