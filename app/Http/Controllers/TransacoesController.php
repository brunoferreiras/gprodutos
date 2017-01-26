<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntradaProdutos;
use App\SaidaProdutos;

class TransacoesController extends Controller
{
    private $entradaProduto;
    private $saidaProduto;

    public function __construct(EntradaProdutos $entradaProduto, SaidaProdutos $saidaProduto){
    	$this->entradaProduto = $entradaProduto;
    	$this->saidaProduto = $saidaProduto;
    	$this->middleware('auth');
    }

    public function create_entrada(){

    	$titulo = 'Registrar Devolução | Sistema de Gerenciamento de Produtos';

        return view('transacoes.registrar_devolucao', compact('titulo'));
    }

    public function create_saida(){

    	$titulo = 'Registrar Empréstimo | Sistema de Gerenciamento de Produtos';

        return view('transacoes.registrar_emprestimo', compact('titulo'));
    }

    public function store_entrada(){

    }

    public function store_saida(){

    }
}
