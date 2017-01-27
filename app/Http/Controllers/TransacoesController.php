<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntradaProdutos;
use App\SaidaProdutos;
use App\Produto;
use Illuminate\Support\Facades\Auth;

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
    	$produtos = Produto::all();

        return view('transacoes.registrar_emprestimo', compact('titulo', 'produtos'));
    }

    public function store_entrada(Request $request){

    }

    public function store_saida(Request $request){

    	$this->validate($request, [
    		'produto' => 'required',
    		'quantidade' => 'required|numeric'
    	]);

    	$dados = [
    		'users_id' => Auth::id(),
    		'produtos_id' => $request->produto,
    		'quantidade_saida' => $request->quantidade,
    		'horas_saida' => date("Y-m-d H:i:s"),
    	];

    	$criado = $this->saidaProduto->create($dados);

    	if( $criado ){
    		return redirect()->action('TransacoesController@create_saida')->with('success', 'Produto emprestado com sucesso!');
    	}
    	else{
    		return redirect()->action('TransacoesController@create_saida')->with('error', 'Não foi possível registrar o empréstimo! Por favor, tente novamente!');
    	}
    }
}
