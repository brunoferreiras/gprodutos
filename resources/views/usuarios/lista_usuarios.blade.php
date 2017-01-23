@extends('templates.login-template')

@section('content')
	<table class="table table-bordered table-striped">
		<thead>
			<th>Matrícula</th>
			<th>Usuário</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Nível de Acesso</th>
			<th>Ações</th>
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
					<a href="{{ route("usuarios.show/$usuario->id") }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
					|
					<a href="{{ route("usuarios.edit/$usuario->id") }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					|
					<a href="{{ route("usuarios.delete/$usuario->id") }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			@empty
				<tr>Nenhum dado encontrado!</tr>
			@endforelse
		</tbody>		
	</table>
@endsection