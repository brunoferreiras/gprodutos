@extends('layouts.app')

@section('content')
	<h1 class="text-center">Lista dos usuários</h1>
	<div class="form-group">
		<a class="btn btn-success" href="{{ url('usuarios/create') }}">Cadastrar Usuário</a>
	</div>
	
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<th>Matrícula</th>
			<th>Usuário</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Nível de Acesso</th>
			<th style="width: 150px;">Ações</th>
		</thead>
		<tbody>
			@forelse($usuarios as $usuario)
			<tr>
				<td>{{ $usuario->matricula }}</td>
				<td>{{ $usuario->usuario }}</td>
				<td>{{ $usuario->nome }}</td>
				<td>{{ $usuario->email }}</td>
				<td>{{ $usuario->nivel_acesso }}</td>
				<td>
					<a class="btn btn-info btn-sm" href="{{ url("usuarios/show/$usuario->id") }}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
					<a class="btn btn-primary btn-sm" href="{{ url("usuarios/edit/$usuario->id") }}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
					<a class="btn btn-danger btn-sm" href="{{ url("usuarios/destroy/$usuario->id") }}"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
				</td>
			</tr>
			@empty
				<tr>Nenhum dado encontrado!</tr>
			@endforelse
		</tbody>		
	</table>
	{!! $usuarios->links() !!}
@endsection