@extends('templates.menu-template')

@section('content')
	<h1 class="text-center">Lista dos produtos</h1>
	<div class="form-group">
		<a class="btn btn-success" href="{{ url('produtos/create') }}">Cadastrar Produto</a>
	</div>
	
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<th>Tag RFID</th>
			<th>Código de Barras</th>
			<th>Produto</th>
			<th>Descrição</th>
			<th>Quantidade</th>
			<th>Quem Cadastrou</th>
			<th>Ações</th>
		</thead>
		<tbody>
			@forelse($produtos as $produto)
			<tr>
				<td>{{ $produto->tag_rfid }}</td>
				<td>{{ $produto->cod_barras }}</td>
				<td>{{ $produto->produto }}</td>
				<td>{{ $produto->descricao }}</td>
				<td>{{ $produto->quantidade }}</td>
				<td>{{ $produto->users_id }}</td>
				<td>
					<a href="{{ route("produtos.show", ["id" => $produto->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
					|
					<a href="{{ route("produtos.edit", ["id" => $produto->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					|
					<a href="{{ route("produtos.destroy", ["id" => $produto->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			@empty
				<tr>Nenhum dado encontrado!</tr>
			@endforelse
		</tbody>		
	</table>
	{!! $produtos->links() !!}
@endsection