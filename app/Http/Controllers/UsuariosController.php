<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuariosController extends Controller
{
    private $user;
    private $totalPage;

    public function __construct(User $user){
        $this->user = $user;
        $this->totalPage = 5;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios =  $this->user->paginate($this->totalPage); // Retorna todos os dados dos usuários
        $titulo = 'Usuários | Sistema de Gerenciamento de Produtos';

        return view('usuarios.lista_usuarios', compact('usuarios', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Criar Usuário | Sistema de Gerenciamento de Produtos';
        return view('usuarios.criar_usuarios', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'matricula' => 'required|max:255',
            'usuario' => 'required|max:255',
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'nivel_acesso' => 'required',
        ]);

        $dados = [
            'matricula' => $request->matricula,
            'usuario' => $request->usuario,
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nivel_acesso' => $request->nivel_acesso,
        ];

        $cadastro = User::create($dados);
        if ( $cadastro ) {
            return redirect()->action('UsuariosController@index')->with('success', 'Usuário cadastrado com sucesso!');
        }
        else{
            return redirect()->action('UsuariosController@index')->with('error', 'Não foi possível registrar o usuário! Por favor, tente novamente!');
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
        $usuario = $this->user->find($id);
        $titulo = "Usuário: ".$usuario->usuario." | Sistema de Gerenciamento de Produtos";

        return view('usuarios.mostrar_usuario', compact('usuario', 'titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = $this->user->find($id);
        $matricula = $usuario->matricula;
        $titulo = "Editar Usuário: ".$usuario->usuario." | Sistema de Gerenciamento de Produtos";

        return view('usuarios.editar_usuario', compact('usuario', 'title'));
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
        $this->validate($request, [
            'matricula' => 'required|max:255',
            'usuario' => 'required|max:255',
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'nivel_acesso' => 'required',
        ]);

        $update = $this->user->find($id)->update($request->all());

        if($update){
            return redirect()->action('UsuariosController@index')->with('success', 'Usuário atualizado com sucesso!');
        }
        else{
            return redirect()->action('UsuariosController@index')->with('error', 'Não foi possível atualizar o usuário! Por favor, tente novamente!');
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
        $delete = $this->user->find($id)->delete();

        if($delete){
            return redirect()->action('UsuariosController@index')->with('success', 'Usuário excluído com sucesso!');
        }
        else{
            return redirect()->action('UsuariosController@index')->with('error', 'Não foi possível excluir o usuário! Por favor, tente novamente!');
        }
    }
}
