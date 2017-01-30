<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    private $produto;
    private $totalPage;
    private $usuario;

    public function __construct(Produto $produto, User $user){
        $this->produto = $produto;
        $this->totalPage = 10;
        $this->usuario = $user;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto->paginate($this->totalPage);

        foreach ($produtos as $valor) {
            $valor->users_id = $this->usuario->get_nomeUsuario($valor->users_id);
        }

        $titulo = 'Produtos | Sistema de Gerenciamento de Produtos';

        return view('produtos.lista_produtos', compact('produtos', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Criar Produto | Sistema de Gerenciamento de Produtos';

        return view('produtos.criar_produtos', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'tag_rfid' => 'required|unique:produtos',
            'cod_barras' => 'required|unique:produtos',
            'produto' => 'required|unique:produtos',
            'descricao' => 'required',
            'quantidade' => 'required',
        ]);

        $dados = [
            'tag_rfid' => $request->tag_rfid,
            'cod_barras' => $request->cod_barras,
            'produto' => $request->produto,
            'descricao' => $request->descricao,
            'quantidade' => $request->quantidade,
            'users_id' => Auth::id(),
        ];

        $criado = $this->produto->create($dados);

        if($criado){
            return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
        }
        else{
            return redirect()->route('produtos.index')->with('error', 'Não foi possível cadastrar o produto! Por favor, tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        $titulo = "Produto: ".$produto->produto." | Sistema de Gerenciamento de Produtos";

        return view('produtos.mostra_produto', compact('produto', 'titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto->find($id);
        $titulo = "Editar Produto: ".$produto->produto." | Sistema de Gerenciamento de Produtos";

        return view('produtos.editar_produto', compact('produto', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tag_rfid' => 'required',
            'cod_barras' => 'required',
            'produto' => 'required',
            'descricao' => 'required',
            'quantidade' => 'required',
        ]);

        $update = $this->produto->find($id)->update($request->all());

        if($update){
            return redirect()->route('produtos.index')->with('success', 'Produto editado com sucesso!');
        }
        else{
            return redirect()->route('produtos.index')->with('error', 'Não foi possível editar o produto! Por favor, tente novamente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->produto->find($id)->delete();

        if($delete){
            return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
        }
        else{
            return redirect()->route('produtos.index')->with('error', 'Não foi possível excluir o produto! Por favor, tente novamente!');
        }
    }
}
