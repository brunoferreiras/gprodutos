@extends('layouts.app')

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
			<th style="width: 150px;">Ações</th>
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
					<a class="btn btn-info btn-sm" href="{{ route("produtos.show", ["id" => $produto->id]) }}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
					<a class="btn btn-primary btn-sm" href="{{ route("produtos.edit", ["id" => $produto->id]) }}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
					<form id="form_del" style="display: inline;" method="POST" action="{{ route("produtos.destroy", ["id" => $produto->id]) }}">
						{{ method_field("DELETE") }}
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
					</form>
				</td>
			</tr>
			@empty
				<tr>
					<td class="text-center" colspan="7">Nenhum produto encontrado!</td>
				</tr>
			@endforelse
		</tbody>		
	</table>
	{!! $produtos->links() !!}
@endsection