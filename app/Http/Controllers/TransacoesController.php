<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntradaProdutos;
use App\SaidaProdutos;
use App\Produto;
use App\User;
use Illuminate\Support\Facades\Auth;

class TransacoesController extends Controller
{
    private $entradaProduto;
    private $saidaProduto;
    private $usuario;
    private $produto;

    public function __construct(User $user, EntradaProdutos $entradaProduto, SaidaProdutos $saidaProduto, Produto $produto){
    	$this->entradaProduto = $entradaProduto;
    	$this->saidaProduto = $saidaProduto;
        $this->usuario = $user;
        $this->produto = $produto;
    	$this->middleware('auth');
    }

    public function create_entrada(){

    	$titulo = 'Registrar Devolução | Sistema de Gerenciamento de Produtos';
        $registro_saidas = $this->saidaProduto->all();

        foreach($registro_saidas as $valor){
            $valor->users_id = $this->usuario->get_nomeUsuario($valor->users_id);
            $valor->produto_nome = $this->produto->get_nomeProduto($valor->produtos_id);
        }

        return view('transacoes.registrar_devolucao', compact('titulo', 'registro_saidas'));
    }

    public function create_saida(){

    	$titulo = 'Registrar Empréstimo | Sistema de Gerenciamento de Produtos';
    	$produtos = Produto::all();

        return view('transacoes.registrar_emprestimo', compact('titulo', 'produtos'));
    }

    public function store_entrada(Request $request){

        $this->validate($request, [
            'produto' => 'required',
            'quantidade_devolucao' => 'required|numeric'
        ]);

        $dados = [
            'users_id' => Auth::id(),
            'produtos_id' => $request->produto,
            'quantidade_entrada' => $request->quantidade_devolucao,
            'horas_entrada' => date("Y-m-d H:i:s"),
        ];

        $qtd_produtos = $this->entradaProduto->find($request->produto)->quantidade;;

        $criado = $this->entradaProduto->create($dados);

        if( $criado ){
            return redirect()->action('TransacoesController@create_entrada')->with('success', 'Produto devolvido com sucesso!');
        }
        else{
            return redirect()->action('TransacoesController@create_entrada')->with('error', 'Não foi possível registrar a devolução! Por favor, tente novamente!');
        }
    }

    public function store_saida(Request $request){

    	$this->validate($request, [
    		'produto' => 'required',
    		'quantidade' => 'required|numeric|min:1'
    	]);

    	$dados = [
    		'users_id' => Auth::id(),
    		'produtos_id' => $request->produto,
    		'quantidade_saida' => $request->quantidade,
    		'horas_saida' => date("Y-m-d H:i:s"),
    	];

        // Recebe a quantidade de produtos disponíveis no momento
        $qtd_produtos = $this->produto->find($request->produto)->quantidade;

        // Verifica se tem produtos suficientes para realizar o empréstimo
        if(($qtd_produtos - $request->quantidade) >= 0){

            $criado = $this->saidaProduto->create($dados);
            $qtd_atualizada = $qtd_produtos - $request->quantidade;
            // Atualiza a quantidade disponível do produto no banco
            $this->produto->find($request->produto)->update(['quantidade' => $qtd_atualizada]);  

            if( $criado ){
                return redirect()->action('TransacoesController@create_saida')->with('success', 'Produto emprestado com sucesso!');
            }
            else{
                return redirect()->action('TransacoesController@create_saida')->with('error', 'Não foi possível registrar o empréstimo! Por favor, tente novamente!');
            }
        }
        else{
            return redirect()->action('TransacoesController@create_saida')->with('error', 'Não foi possível registrar o empréstimo! Quantidade de Produtos Insuficientes!');
        }
    }
}
